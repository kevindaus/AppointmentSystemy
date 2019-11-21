<?php

namespace App\Http\Controllers;

use App\Collateral;
use App\CoMaker;
use App\CreditApplication;
use App\CreditApplicationCoMaker;
use App\CreditApplicationProduct;
use App\CreditApplicationStaff;
use App\Customer;
use App\CustomersCollateral;
use App\Forms\CoMakerForm;
use App\Forms\CreditApplication\AssistingStaffForm;
use App\Forms\CreditApplication\ComputationalBreakdown;
use App\Forms\CreditApplication\FinalNoteForm;
use App\Forms\CreditApplicationForm;
use App\Forms\CustomerForm;
use App\Forms\CustomersCollateralForm;
use App\Forms\UpdateCustomerForm;
use App\Forms\UpdateStaffForm;
use App\Product;
use App\Staff;
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


    public function choose_product(Customer $customer, CreditApplication $credit_application)
    {
        $allProducts = Product::all();

        return view('application_form.choose_product')->with(compact('customer', 'credit_application', 'allProducts'));
    }

    public function save_product(CreditApplication $credit_application, Customer $customer, Request $request)
    {
        $validatedData = $request->validate([
            'product' => 'required'
        ]);
        $product = Product::findOrFail($validatedData['product']);
        $credit_application_product = new CreditApplicationProduct();
        $credit_application_product->credit_application_id = $credit_application->id;
        $credit_application_product->product_id = $product->id;
        $credit_application_product->save();
        return redirect(route('computation_breakdown', ['credit_application' => $credit_application, 'customer' => $customer]));
    }

    public function computation_breakdown(CreditApplication $credit_application, Customer $customer, FormBuilder $formBuilder)
    {
        $computationalBreakdownForm = $formBuilder->create(ComputationalBreakdown::class, [
            'method' => 'POST',
            'url' => route('save_computation_breakdown', ['credit_application' => $credit_application, 'customer' => $customer])
        ]);
        return view('application_form.computation_breakdown')->with([
            'credit_application' => $credit_application,
            'customer' => $customer,
            'computationalBreakdownForm' => $computationalBreakdownForm,
        ]);

    }

    public function save_computation_breakdown(CreditApplication $credit_application, Customer $customer, Request $request)
    {
        $validatedData = $request->validate([
            'adp' => ' ',
            'adp_ma' => ' ',
            'adp_rebate' => ' ',
            'adp_net' => ' ',
            'dp' => ' ',
            'dp_ma' => ' ',
            'dp_cropping' => ' ',
            'dp_rebate' => ' ',
            'dp_net' => ' '
        ]);

        $credit_application->adp = $validatedData['adp'];
        $credit_application->adp_ma = $validatedData['adp_ma'];
        $credit_application->adp_rebate = $validatedData['adp_rebate'];
        $credit_application->adp_net = $validatedData['adp_net'];
        $credit_application->dp = $validatedData['dp'];
        $credit_application->dp_ma = $validatedData['dp_ma'];
        $credit_application->dp_cropping = $validatedData['dp_cropping'];
        $credit_application->dp_rebate = $validatedData['dp_rebate'];
        $credit_application->dp_net = $validatedData['dp_net'];
        $credit_application->save();

        return redirect(route('co_makers', ['credit_application' => $credit_application, 'customer' => $customer]));

    }

    public function co_makers(CreditApplication $credit_application, Customer $customer, FormBuilder $formBuilder)
    {
        $coMakerForm = $formBuilder->create(CoMakerForm::class, [
            'method' => 'POST',
            'url' => route('save_co_makers', ['credit_application' => $credit_application, 'customer' => $customer])
        ]);
        return view('application_form.co_maker')->with(
            [
                'credit_application' => $credit_application,
                'customer' => $customer,
                'coMakerForm' => $coMakerForm
            ]
        );
    }

    public function save_co_makers(CreditApplication $credit_application, Customer $customer, Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'middle_name' => ' ',
            'last_name' => 'required',
            'address' => ' ',
            'relationship' => ' ',
            'occupation' => ' ',
            'contact_number' => ' ',
            'legal_document_presented' => ' ',
            'identification_number' => ' ',
            'drivers_license' => ' ',
            'first_signature_specimen' => ' ',
            'second_signature_specimen' => ' ',
            'third_signature_specimen' => ' ',
        ]);
        /*save the uploaded file , if present */

//        $coMaker = CoMaker::create($validatedData);

        $first_signature_specimen = '';
        if (isset($validatedData['first_signature_specimen'])) {
            $first_signature_specimen = $validatedData['first_signature_specimen'];
            $uploadedFile = $validatedData['first_signature_specimen'];
            $first_signature_specimen = $uploadedFile->getClientOriginalName();
            $uploadedFile->move(storage_path("app/public"), $uploadedFile->getClientOriginalName());
        }
        $second_signature_specimen = '';
        if (isset($validatedData['second_signature_specimen'])) {
            $second_signature_specimen = $validatedData['second_signature_specimen'];
            $uploadedFile = $validatedData['second_signature_specimen'];
            $second_signature_specimen = $uploadedFile->getClientOriginalName();
            $uploadedFile->move(storage_path("app/public"), $uploadedFile->getClientOriginalName());
        }
        $third_signature_specimen = '';
        if (isset($validatedData['third_signature_specimen'])) {
            $third_signature_specimen = $validatedData['third_signature_specimen'];
            $uploadedFile = $validatedData['third_signature_specimen'];
            $third_signature_specimen = $uploadedFile->getClientOriginalName();
            $uploadedFile->move(storage_path("app/public"), $uploadedFile->getClientOriginalName());
        }

        $co_maker = new CoMaker();
        $co_maker->title = $validatedData['title'];
        $co_maker->first_name = $validatedData['first_name'];
        $co_maker->middle_name = $validatedData['middle_name'];
        $co_maker->last_name = $validatedData['last_name'];
        $co_maker->address = $validatedData['address'];
        $co_maker->relationship = $validatedData['relationship'];
        $co_maker->occupation = $validatedData['occupation'];
        $co_maker->contact_number = $validatedData['contact_number'];
        $co_maker->legal_document_presented = $validatedData['legal_document_presented'];
        $co_maker->identification_number = $validatedData['identification_number'];
        $co_maker->drivers_license = $validatedData['drivers_license'];
        $co_maker->first_signature_specimen = $first_signature_specimen;
        $co_maker->second_signature_specimen = $second_signature_specimen;
        $co_maker->third_signature_specimen = $third_signature_specimen;
        $co_maker->save();

        $credit_application_co_maker = new CreditApplicationCoMaker();
        $credit_application_co_maker->credit_application_id = $credit_application->id;
        $credit_application_co_maker->co_maker_id = $co_maker->id;
        $credit_application_co_maker->save();
        return redirect(route('map_address', ['credit_application' => $credit_application, 'customer' => $customer]));
    }

    public function map_address(CreditApplication $credit_application, Customer $customer, FormBuilder $formBuilder)
    {

        return view('application_form.map_address')->with([
            'credit_application' => $credit_application,
            'customer' => $customer,
        ]);
    }

    public function save_map_address(CreditApplication $credit_application, Customer $customer, Request $request)
    {
        $validatedData = $request->validate([
            'longitude' => 'required',
            'latitude' => 'required'
        ]);
        $credit_application->map_location_longitude = $validatedData['longitude'];
        $credit_application->map_location_latitude = $validatedData['latitude'];
        $credit_application->save();

        return redirect(route('assisting_staff', ['credit_application' => $credit_application, 'customer' => $customer]));
    }

    public function assisting_staff(CreditApplication $credit_application, Customer $customer, FormBuilder $formBuilder)
    {

        $assisting_staff_form = $formBuilder->create(AssistingStaffForm::class, [
            'method' => 'POST',
            'url' => route('save_assisting_staff', ['credit_application' => $credit_application, 'customer' => $customer])
        ]);


        return view('application_form.assisting_staff')->with([
            'credit_application' => $credit_application,
            'customer' => $customer,
            'assisting_staff_form' => $assisting_staff_form,
        ]);
    }
    public function save_assisting_staff(CreditApplication $credit_application, Customer $customer, Request $request)
    {
        $validatedData = $request->validate([
            'branch_manager' => 'required',
            'received_by_ci' => 'required',
            'correct_and_confirmed_by' => 'required',
            'field_salesman' => 'required'
        ]);
        $branch_manager = new CreditApplicationStaff();
        $branch_manager->credit_application_id = $credit_application->id;
        $branch_manager->staff_id = $validatedData['branch_manager'];
        $branch_manager->role = Staff::POSITION_BRANCH_MANAGER;
        $branch_manager->save();

        $received_by_ci = new CreditApplicationStaff();
        $received_by_ci->credit_application_id = $credit_application->id;
        $received_by_ci->staff_id = $validatedData['received_by_ci'];
        $received_by_ci->role = Staff::POSITION_CREDIT_RECEIVER;
        $received_by_ci->save();

        $correct_and_confirmed_by = new CreditApplicationStaff();
        $correct_and_confirmed_by->credit_application_id = $credit_application->id;
        $correct_and_confirmed_by->staff_id = $validatedData['correct_and_confirmed_by'];
        $correct_and_confirmed_by->role = Staff::POSITION_CLARIFIER;
        $correct_and_confirmed_by->save();

        $field_salesman = new CreditApplicationStaff();
        $field_salesman->credit_application_id = $credit_application->id;
        $field_salesman->staff_id = $validatedData['field_salesman'];
        $field_salesman->role = Staff::POSITION_FIELD_SALESMAN;
        $field_salesman->save();


        return redirect(route('final_notes', ['credit_application' => $credit_application, 'customer' => $customer]));
    }

    public function final_notes(CreditApplication $credit_application, Customer $customer, FormBuilder $formBuilder)
    {
        $finalNotesForm = $formBuilder->create(FinalNoteForm::class, [
            'method' => 'POST',
            'url' => route('save_final_notes', ['credit_application' => $credit_application, 'customer' => $customer])
        ]);

        return view('application_form.final_notes')->with([
            'credit_application'=>$credit_application,
            'customer'=>$customer,
            'finalNotesForm'=>$finalNotesForm
        ]);
    }

    public function save_final_notes(CreditApplication $credit_application, Customer $customer, Request $request)
    {
        $validatedData = $request->validate([
            'final_note' => 'required'
        ]);
        $credit_application->recommendation_of_branch_manager = $validatedData['final_note'];
        $credit_application->save();
        return redirect(route('application_done', ['credit_application' => $credit_application, 'customer' => $customer]));

    }

    public function application_done(CreditApplication $credit_application, Customer $customer)
    {
        /*done - show success message */
        return view('application_form.application_done')->with(
            compact(
                $credit_application,
                $customer
            )
        );
    }
}
