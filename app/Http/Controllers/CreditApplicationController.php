<?php

namespace App\Http\Controllers;

use App\CreditApplication;
use App\Customer;
use App\Forms\CreditApplication\ApprovalForm;
use App\Forms\CreditApplication\FinalNoteForm;
use App\Sale;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class CreditApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $creditApplications = CreditApplication::orderBy('id','DESC')->get();
        return view('credit-application.index')->with(
            compact('creditApplications')
        );
    }

    public function pending()
    {
        $pendingApplication = CreditApplication::where(['application_status' => 'pending'])->get();

        return view('credit-application.pending')->with([
            'pendingApplication' => $pendingApplication
        ]);
    }

    public function approve(CreditApplication $credit_application , FormBuilder $formBuilder)
    {
        $credit_application_approval_form = $formBuilder->create(ApprovalForm::class, [
            'method' => 'POST',
            'model'=>$credit_application,
            'url' => route('credit-applications.save_approval', ['credit_application' => $credit_application])
        ]);
        return view('credit-application.approve')->with([
            'credit_application_approval_form' => $credit_application_approval_form,
            'credit_application' => $credit_application,
        ]);
    }

    public function save_approval(CreditApplication $credit_application, Request $request)
    {
        $validatedData = $request->validate([
            'customer_id'=>'required',
            'credit_application_id'=>'required',
            'product_id'=>'required',
            'total_amount'=>'required',
            'tax_rate'=>'required',
        ]);
        $credit_application->application_status = CreditApplication::STATUS_APPROVED;
        $credit_application->save();

        /* make a sale */
        $sale = new Sale();
        $sale->customer_id = $validatedData['customer_id'];
        $sale->credit_application_id = $validatedData['credit_application_id'];
        $sale->product_id = $validatedData['product_id'];
        $sale->tax_rate = floatval($validatedData['tax_rate']);
        $tempTotalAmount = floatval($validatedData['total_amount']);
        $tempTotalAmount = $tempTotalAmount + ($tempTotalAmount * ($sale->tax_rate / 100));
        /* computed base on product price */
        $sale->total_amount = $tempTotalAmount;
        $sale->status = Sale::STATUS_APPROVED;
        $sale->remaining_balance = $sale->total_amount;
        $sale->save();

        return redirect(route('credit-applications.show',['credit_application'=>$credit_application]))->with([
            'status' => "Credit Application Approved! "
        ]);
    }

    public function deny(CreditApplication $credit_application)
    {
        $credit_application->application_status = CreditApplication::STATUS_DENIED;
        $credit_application->save();
        return redirect(url()->previous())->with([
            'status' => "Credit Application Approved!"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "title"=>'required',
            "first_name"=>'required',
            "last_name"=>'required',
            "birthday"=>'required',
            "facebook_account"=>'required',
            "civil_status"=>'required',
            "gender"=>'required',
            "tin_id"=>'required',
            "house_number"=>'required',
            "street"=>'required',
            "barangay"=>'required',
            "municipality"=>'required',
            "province"=>'required',
            "zipcode"=>'required',
            "length_of_stay_present_address"=>'required',
            "house_ownership"=>'required',
            "mobile_number"=>'required',
        ]);
        Customer::create($validatedData);

        return route(url()->previous())->with(['success' => 'Customer created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CreditApplication  $credit_application
     * @return \Illuminate\Http\Response
     */
    public function show(CreditApplication $credit_application)
    {
        /* @TODO - credit application - show better information*/
        $creditApplicationDetails = $credit_application->toArray();
        unset($creditApplicationDetails['id']);
        return view('credit-application.show')->with(compact('credit_application','creditApplicationDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CreditApplication  $creditApplication
     * @return \Illuminate\Http\Response
     */
    public function edit(CreditApplication $creditApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CreditApplication  $creditApplication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CreditApplication $creditApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CreditApplication  $creditApplication
     * @return \Illuminate\Http\Response
     */
    public function destroy(CreditApplication $creditApplication)
    {
        //
    }
}
