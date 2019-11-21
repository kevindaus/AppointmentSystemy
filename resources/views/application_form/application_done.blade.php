@extends('layouts.app', [
    'namePage' => 'Home',
    'namePageLink' => route('home'),
    'activePage' => 'application_form',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('Form Application Complete') }}</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mr-auto">
                    <br>
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Form submitted! Waiting for admin approval.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="row">
                                <div class="col-3">
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-lg btn-primary" href="{{route('apply_credit_application')}}">
                                        <i class="fa fa-user"></i>
                                        Click here if you want to create another application form
                                    </a>
                                </div>
                                <div class="col-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

