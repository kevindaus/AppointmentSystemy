@extends('layouts.app', [
    'namePage' => 'Back',
    'namePageLink' => route('staffs.index'),
    'activePage' => 'register',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('Add new staff') }}</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mr-auto">
                    <br>
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <br>
                            <form method="POST" action="{{ route('staffs.update',['staff'=>$staff]) }}" class="row text-left">
                                @csrf
                                @method("PUT")
                                {!! form($staffForm) !!}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

