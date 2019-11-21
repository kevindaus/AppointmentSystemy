<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function due_payment()
    {
        /* @TODO - show list of unpaid dues*/
        $overDuecreditApplications = CreditApplication::all();// get all overdue
        return view('payment.over_due')->with(compact('overDuecreditApplications'));
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
