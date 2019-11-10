<?php

namespace App\Http\Controllers;

use App\Forms\CustomerForm;
use App\Forms\StaffForm;
use App\Forms\UpdateStaffForm;
use App\Staff;
use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allStaff = Staff::orderBy('id','DESC')->get();
        return view('staffs.index')->with(compact('allStaff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(FormBuilder $formBuilder)
    {
        $staffForm = $formBuilder->create(StaffForm::class, [
            'method'=>'POST',
            'url'=>route('staffs.store')
        ]);
        return view('staffs.create')->with(compact('staffForm'));
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
            'title'=>'required',
            'first_name'=>'required',
            'last_name'=>'required'
        ]);
        Staff::create($validatedData);
        return redirect(url()->previous())->with(
            [
                'status' => "Record saved"
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff, FormBuilder $formBuilder)
    {
        $staffForm = $formBuilder->create(UpdateStaffForm::class, [
            'method'=>'POST',
            'model' => $staff,
            'url'=>route('staffs.update',['staff'=>$staff])
        ]);

        return view('staffs.update')->with(compact('staffForm','staff'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'title'=>'required',
            'first_name'=>'required',
            'middle_name'=>'',
            'last_name'=>'required',
        ]);
        $staff->title = $validatedData['title'];
        $staff->first_name = $validatedData['first_name'];
        $staff->middle_name = $validatedData['middle_name'];
        $staff->last_name = $validatedData['last_name'];
        $staff->save();
        return redirect(url()->previous())->with(['status' => 'Record updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->forceDelete();
        return redirect(url()->previous())->with(['status'=>'Staff record deleted']);
    }
}
