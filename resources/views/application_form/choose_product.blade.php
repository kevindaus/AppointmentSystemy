@extends('layouts.app', [
    'namePage' => 'Home',
    'namePageLink' => route('home'),
    'activePage' => 'application_form',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <style type="text/css">
        .product-card {
            padding: 20px;

        }
        .product-card:hover {
            background: #295687;
            color: white;
        }
        .product-card input[type='radio'] {
            margin-top: 20px;
        }
        .product-card:hover h5 {
            color: white;
        }
    </style>
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('Choose Product') }}</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mr-auto">
                    <br>
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                            <h1>Step 5 of 9</h1>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <form action="{{route('save_product',['credit_application'=>$credit_application,'customer'=>$customer])}}" method="POST" class="row">
                                        @csrf
                                        @foreach($allProducts as $currentProduct)
                                            <div class="form-check col-3 mb-5 product-card">
                                                <label for="{{$currentProduct->id}}"  style="cursor: pointer">
                                                    <h5>{{$currentProduct->name}}</h5>
                                                    <img src="{{asset('storage/'.$currentProduct->picture)}}" alt="" class="img img-thumbnail" style="height: 140px">
                                                    <input id="{{$currentProduct->id}}" type="radio" name="product" value="{{$currentProduct->id}}" >
                                                </label>
                                            </div>
                                        @endforeach
                                        <input type="submit" class="btn btn-primary col-12">
                                    </form>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

