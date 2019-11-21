@extends('layouts.app', [
    'namePage' => 'Home',
    'namePageLink' => route('home'),
    'activePage' => 'application_form',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('Staff who handled the application') }}</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mr-auto">
                    <br>
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                            <h1>Step 9 of 9</h1>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-6">
                                    <form method="POST" action="{{ route('save_assisting_staff',['customer'=>$customer , 'credit_application'=>$credit_application]) }}" class="row text-left">
                                        @csrf
                                        {!! form($assisting_staff_form) !!}
                                    </form>
                                </div>
                                <div class="col-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

