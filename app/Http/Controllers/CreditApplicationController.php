<?php

namespace App\Http\Controllers;

use App\CreditApplication;
use App\Customer;
use Illuminate\Http\Request;

class CreditApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditApplications = CreditApplication::all();
        return view('credit-application.index')->with(
            compact('creditApplications')
        );
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
