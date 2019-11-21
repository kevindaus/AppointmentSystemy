@extends('layouts.app', [
    'namePage' => 'Home',
    'namePageLink' => route('home'),
    'activePage' => 'application_form',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('Branch Manager Final Notes') }}</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mr-auto">
                    <br>
                    <div class="card card-signup">
                        <div class="card-header ">

                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="row">
                                <div class="col-3">
                                </div>
                                <div class="col-6">
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        Branch manager notes and insights
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="{{ route('save_final_notes',['customer'=>$customer , 'credit_application'=>$credit_application]) }}" class="row text-left">
                                        @csrf
                                        {!! form($finalNotesForm) !!}
                                    </form>
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

