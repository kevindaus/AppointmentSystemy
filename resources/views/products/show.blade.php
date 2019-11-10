@extends('layouts.app', [
    'namePage' => 'Back',
    'namePageLink' => route("products.index"),
    'class' => 'sidebar-mini',
    'activePage' => 'customers',
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
                            <table class="table">
                                <tbody>
                                @foreach($productDetails as $key=>$val)
                                    <tr>
                                        <td>
                                            {{ \App\Helpers\StringHelper::labelify($key) }}
                                        </td>
                                        <td>
                                            {{ $product->$key  }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
