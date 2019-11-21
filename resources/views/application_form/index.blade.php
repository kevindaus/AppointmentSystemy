@extends('layouts.app', [
    'namePage' => 'Home',
    'namePageLink' => route('home'),
    'activePage' => 'application_form',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('New Form Application') }}</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mr-auto">
                    <br>
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                            <h1>Step 1 of 9</h1>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="row">
                                <div class="col-6">
                                    <a class="btn btn-lg btn-primary" href="{{route('register_customer')}}">
                                        <i class="fa fa-plus"></i>
                                        New Customer
                                    </a>
                                    <p class="hint">Click here for new customer</p>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-lg btn-primary" href="{{route('search_customer')}}">
                                        <i class="fa fa-user"></i>
                                        Existing Customer
                                    </a>
                                    <p class="hint">Click here for existing customer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
