@extends('layouts.app', [
    'namePage' => 'Customers',
    'namePageLink' => route("customers.index"),
    'class' => 'sidebar-mini',
    'activePage' => 'customer',
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
                        <h4 class="card-title">Customers</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($customers as $currentCustomer)
                                    <tr>
                                        <td>
                                            {{ $currentCustomer->getFullName()  }}
                                        </td>
                                        <td>
                                            {{ $currentCustomer->mobile_number  }}
                                        </td>
                                        <td>
                                            <a href="{{route('customers.show',['customer'=>$currentCustomer])}}">View</a> |
                                            <a href="{{route('customers.edit',['customer'=>$currentCustomer])}}">Update</a>
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
