@extends('layouts.app', [
    'namePage' => 'Payments',
    'namePageLink' => route('staffs.index'),
    'class' => 'sidebar-mini',
    'activePage' => 'overdue',
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
                        <h4 class="card-title">Overdue Accounts</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    Customer
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($overDuePayments as $currentOverdueSale)
                                    @php
                                        $currentCustomer = $currentOverdueSale->getCustomer();
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ $currentCustomer->getFullName()  }}
                                        </td>
                                        <td>
                                            {{ $currentCustomer->getFullAddress()  }}
                                        </td>
                                        <td>
                                            {{ $currentCustomer->mobile_number  }}
                                        </td>
                                        <td>
                                            <a href="{{route('notification')}}">Send Notification</a>
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
