<?php

namespace App\Http\Controllers;

use App\Collateral;
use App\CreditApplication;
use App\CreditApplicationProduct;
use App\Customer;
use App\CustomersCollateral;
use App\Forms\CreditApplicationForm;
use App\Forms\CustomerForm;
use App\Forms\CustomersCollateralForm;
use App\Forms\UpdateCustomerForm;
use App\Product;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class ApplicationFormController extends Controller
{
    public function index()
    {
        return view('application_form.index');
    }

    public function new_customer(FormBuilder $formBuilder)
    {
        $register_customer_form = $formBuilder->create(CustomerForm::class, [
            'method' => 'POST',
            'url' => route('save_customer')
        ]);

        return view('application_form.new_customer')
            ->with(compact('register_customer_form'));
    }

    public function save_customer(Request $request)
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
        $customer = Customer::create($validatedData);

        return redirect(route('show_credit_application', ['customer' => $customer]));
    }

    public function search_customer(Request $request)
    {
        $customers = Customer::orderBy('id', 'DESC')->get();
        if ($request->has('name')) {
            $customers = Customer::orderBy('id', 'DESC')
                ->orWhere('title', 'like', '%' . $request->get('name') . '%')
                ->orWhere('first_name', 'like', '%' . $request->get('name') . '%')
                ->orWhere('middle_name', 'like', '%' . $request->get('name') . '%')
                ->orWhere('last_name', 'like', '%' . $request->get('name') . '%')
                ->get();
        }

        return view('application_form.search_customer')->with(compact('customers'));
    }

    public function show_credit_application(Customer $customer, FormBuilder $formBuilder)
    {
        $credit_application_form = $formBuilder->create(CreditApplicationForm::class, [
            'method' => 'POST',
            'model' => $customer,
            'url' => route('save_credit_application', ['customer' => $customer])
        ]);

        return view('application_form.credit_application_form')->with(
            compact('customer', 'credit_application_form')
        );
    }

    public function save_credit_application(Request $request)
    {
        /*validate and save*/
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'basis' => ' ',
            'terms' => ' ',
            'options' => ' ',
            'due_date' => ' ',
            'request_due_date' => ' ',
            'status_of_customer' => ' ',
            'time_interviewed' => ' ',
            'time_walked_in' => ' ',
            'name_of_referral' => ' ',
            'date_received_by_ci' => ' ',
            'time_received_by_ci' => ' ',
            'distance_from_office' => ' ',
            'time_away_from_office' => ' ',
            'processing_time' => ' ',
            'estimated_time_to_release' => ' ',
        ]);
        $applicationForm = CreditApplication::create($validatedData);
        /* add to cookies the id of customer */
        return redirect(route('collateral_form', [
                'customer' => $validatedData['customer_id'],
                'credit_application' => $applicationForm
            ]
        ));
    }

    public function credit_application_collateral(Customer $customer, CreditApplication $credit_application, FormBuilder $formBuilder)
    {
        $credit_application_collateral = $formBuilder->create(CustomersCollateralForm::class, [
            'method' => 'POST',
            'model' => $customer,
            'url' => route('save_collateral_form', ['customer' => $customer, 'credit_application' => $credit_application])
        ]);
        return view(
            'application_form.credit_application_collateral',
            compact('customer', 'credit_application', 'credit_application_collateral')
        );
    }

    public function save_application_collateral(Customer $customer, CreditApplication $credit_application, Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'name' => 'required',
            'supporting_document' => 'required',
            'estimated_market_value' => 'required|numeric'
        ]);
        /*create collateral information */
        $customerCollateral = CustomersCollateral::create($validatedData);
        /*redirect to choose_product*/
        return redirect(route('choose_product', ['credit_application' => $credit_application, 'customer' => $customer]));
    }


    public function choose_product(Customer $customer , CreditApplication $credit_application)
    {
        $allProducts = Product::all();
        return view('application_form.choose_product')->with(compact('customer','credit_application','allProducts'));
    }

    public function save_product(Customer $customer , CreditApplication $credit_application , Request $request)
    {
        $validatedData = $request->validate([
            'product_id' => 'required',
            'credit_application_id'=>'required'
        ]);
        $credit_application_product = CreditApplicationProduct::create($validatedData);
        return redirect(route('computation_breakdown', ['credit_application' => $credit_application, 'customer' => $customer]));
    }

    public function computation_breakdown()
    {

    }

    public function co_makers()
    {

    }

    public function map_address()
    {

    }

    public function final_notes()
    {

    }
}
