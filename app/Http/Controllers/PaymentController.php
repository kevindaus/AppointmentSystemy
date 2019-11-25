<?php

namespace App\Http\Controllers;

use App\Forms\CreditApplication\ApprovalForm;
use App\Forms\PaymentForm;
use App\PaymentHistory;
use App\Repository\PaymentRepository;
use App\Sale;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class PaymentController extends Controller
{
    private $paymentRepository;

    /**
     * PaymentController constructor.
     * @param $paymentRepository
     */
    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $payments = PaymentHistory::all();
        return view('payment.index')->with([
            'payments'=>$payments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $paymentForm = $formBuilder->create(Paymentform::class, [
            'method' => 'POST',
            'url' => route('payment.store')
        ]);
        return view('payment.make_payment')->with([
            'paymentForm' => $paymentForm
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'sale_id' => 'required',
            'amount' => 'required|min:0',
            'date_received' => '',
            'received_by' => ''
        ]);
        $sale = Sale::findOrFail($validatedData['sale_id']);
        /*reduce remaining balance */
        $updatedBalance = floatval($sale->remaining_balance);
        $sale->remaining_balance = $updatedBalance - floatval($validatedData['amount']);
        $sale->save();
        PaymentHistory::create($validatedData);


        return redirect(url()->previous())->with([
            'status' => 'Payment record created. '
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function overdue()
    {
        $overDuePayments = $this->paymentRepository->getOverDuePayments();

        return view('payment.over_due')->with([
            'overDuePayments'=>$overDuePayments
        ]);
    }

    public function send_due_notification(DuePaymentSMSNotifier $duePaymentSMSNotifier)
    {
        $username_api = setting('API_USERNAME');
        $password_api = setting('API_PASSWORD');
        $duePaymentSMSNotifier->setCredential($username_api, $password_api);

        /* @TODO - get all overdued payment */
        /* foreach  customer  , get their mobile number*/
        /* prepare message  */
        /* send message */
        $duePaymentSMSNotifier->send();
    }
}
