<?php

namespace App\Http\Controllers;

use App\CreditApplication;
use App\Staff;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pendingApplication = CreditApplication::where([
            'application_status' => 'pending',
        ])->get();
        $staffs = Staff::all();
        return view('home')->with([
            'pending_application' => $pendingApplication,
            'staffs' => $staffs
        ]);
    }
}
