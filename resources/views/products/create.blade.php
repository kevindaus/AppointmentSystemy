@extends('layouts.app', [
    'namePage' => 'Products',
    'namePageLink' => route('products.index'),
    'class' => 'sidebar-mini',
    'activePage' => 'product',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('Create new product') }}</h1>
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
                            <form method="POST" action="{{ route('products.store') }}" class="row text-left" enctype="multipart/form-data">
                                @csrf
                                {!! form($createProductForm) !!}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

