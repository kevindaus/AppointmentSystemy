@extends('layouts.app', [
    'namePage' => 'Register page',
    'activePage' => 'register',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('Application Form') }}</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card card-signup text-center">
                        <div class="card-header card-signup">
                            For existing customer
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('customers.apply_new')}}" >

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('customers.store') }}" class="row text-left">
                                @csrf
                                {!! form($form) !!}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

