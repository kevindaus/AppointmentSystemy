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
                            <h1>Step 5 of 8</h1>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="row">
                                <div class="col-3">
                                </div>
                                <div class="col-6">
                                    <form action="{{route('save_product',['credit_application'=>$credit_application,'customer'=>$customer])}}" method="POST">
                                        @csrf
                                        @foreach($allProducts as $currentProduct)
                                            <label for="{{$currentProduct->id}}">{{$currentProduct->name}}</label>
                                            <input label="{{$currentProduct->id}}" type="radio" name="product" value="{{$currentProduct->id}}">
                                        @endforeach
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

