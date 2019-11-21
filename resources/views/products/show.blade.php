@extends('layouts.app', [
    'namePage' => 'Products',
    'namePageLink' => route("products.index"),
    'class' => 'sidebar-mini',
    'activePage' => 'product',
    'backgroundImage' => "/images/honda_logo.png",
  ])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-bordered">
                            <img src="{{asset('storage/'.$productDetails['picture'])}}" alt="" class="img img-thumbnail">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                        Name
                                    </td>
                                    <td>
                                        {{ $product->name  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Description
                                    </td>
                                    <td>
                                        {{ $product->description  }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Specification
                                    </td>
                                    <td>
                                        {{ $product->specification  }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
