@extends('layouts.app', [
    'namePage' => 'Back',
    'namePageLink' => route('products.index'),
    'activePage' => 'product',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('Update Product') }}</h1>
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
                            <form method="POST" action="{{ route('products.edit',['product'=>$product]) }}" class="row text-left">
                                @csrf
                                @method("PUT")
                                {!! form($updateProductForm) !!}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

