@extends('layouts.app', [
    'namePage' => 'View Customer',
    'namePageLink' => route("customers.index"),
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
                        <h4 class="card-title">View Customer</h4>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-info" href="{{route('credit-applications.show',['credit_application'=>$sale->credit_application])}}">View Credit Application Info</a>
                        <div class="table-responsive table-bordered">
                            <table class="table">
                                <tbody>
                                @foreach($salesInfo as $key=>$val)
                                    <tr>
                                        <td>
                                            {{ \App\Helpers\StringHelper::labelify($key) }}
                                        </td>
                                        <td>
                                            {{ $sale->$key  }}
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
