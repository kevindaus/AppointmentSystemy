<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Forms\UpdateCustomerForm;
use App\Forms\UpdateStaffForm;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index')->with(compact('customers'));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id' => ' ',
            'title' => 'required',
            'first_name' => 'required',
            'middle_name' => ' ',
            'last_name' => 'required',
            'suffix' => ' ',
            'birthday' => 'required',
            'facebook_account' => ' ',
            'civil_status' => ' ',
            'wedding_anniversary' => ' ',
            'house_number' => ' ',
            'street' => ' ',
            'barangay' => ' ',
            'municipality' => ' ',
            'province' => ' ',
            'zipcode' => ' ',
            'length_of_stay_present_address' => ' ',
            'previous_address' => ' ',
            'birth_place' => ' ',
            'fathers_name' => ' ',
            'mothers_name' => ' ',
            'gender' => ' ',
            'height' => ' ',
            'weight' => ' ',
            'tin_id' => ' ',
            'house_ownership' => ' ',
            'business_address' => ' ',
            'mobile_number' => ' ',
            'occupation' => ' ',
            'length_of_service' => ' ',
            'basic_income' => ' ',
            'source_of_income' => ' ',
            'other_income' => ' ',
            'name_of_spouse' => ' ',
            'age' => ' ',
            'number_of_children' => ' ',
            'spouse_contact_number' => ' ',
            'spouse_occupation' => ' ',
            'created_at' => ' ',
            'updated_at' => ' '
        ]);
        Customer::create($validatedData);
        return redirect(url()->previous());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {

        return view('customers.show')->with(compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, FormBuilder $formBuilder)
    {
        $customerForm = $formBuilder->create(UpdateCustomerForm::class, [
            'method' => 'POST',
            'model' => $customer,
            'url' => route('customers.update', ['customer' => $customer])
        ]);
        return view('customers.update')->with(compact('customer', 'customerForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate([
            'id' => '',
            'title' => 'required',
            'first_name' => 'required',
            'middle_name' => ' ',
            'last_name' => 'required',
            'suffix' => ' ',
            'birthday' => 'required',
            'facebook_account' => ' ',
            'civil_status' => ' ',
            'wedding_anniversary' => ' ',
            'house_number' => ' ',
            'street' => ' ',
            'barangay' => ' ',
            'municipality' => ' ',
            'province' => ' ',
            'zipcode' => ' ',
            'length_of_stay_present_address' => ' ',
            'previous_address' => ' ',
            'birth_place' => ' ',
            'fathers_name' => ' ',
            'mothers_name' => ' ',
            'gender' => ' ',
            'height' => ' ',
            'weight' => ' ',
            'tin_id' => ' ',
            'house_ownership' => ' ',
            'business_address' => ' ',
            'mobile_number' => ' ',
            'occupation' => ' ',
            'length_of_service' => ' ',
            'basic_income' => ' ',
            'source_of_income' => ' ',
            'other_income' => ' ',
            'name_of_spouse' => ' ',
            'age' => ' ',
            'number_of_children' => ' ',
            'spouse_contact_number' => ' ',
            'spouse_occupation' => ' ',
        ]);
        $props = $customer->toArray();
        unset($props['created_at']);
        unset($props['updated_at']);
        foreach ($props as $key => $val) {
            $customer->$key = $validatedData[$key];
        }
        $customer->save();
        return redirect(url()->previous())->with([
            'status'=>'Record updated'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

}
