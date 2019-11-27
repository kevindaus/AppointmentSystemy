@extends('layouts.app', [
    'namePage' => 'Payments',
    'namePageLink' => route('payment.overdue'),
    'class' => 'sidebar-mini',
    'activePage' => 'due.payment',
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
                        @include('alerts.success')
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
                                <th>
                                    Overdue Date
                                </th>
                                <th class="text-center">
                                    Action
                                </th>

                                </thead>
                                <tbody>
                                @foreach($overDuePayments as $currentOverdueSale)
                                    @php
                                        $currentSale = $currentOverdueSale['sale'];
                                        $overdueDate = $currentOverdueSale['overdue_date'];
                                        $currentCustomer = $currentSale->getCustomer();
                                        $product = $currentSale->getProduct();
                                    @endphp
                                    <tr>
                                        <td>
                                            {{ sprintf("%s %s %s %s",$currentCustomer->title , $currentCustomer->first_name , $currentCustomer->middle_name,$currentCustomer->last_name)  }}
                                        </td>
                                        <td>
                                            {{
                                            sprintf(
                                                "%s %s %s %s %s %s" ,
                                                $currentCustomer->house_number ,
                                                $currentCustomer->street ,
                                                $currentCustomer->barangay ,
                                                $currentCustomer->municipality ,
                                                $currentCustomer->province ,
                                                $currentCustomer->zipcode
                                            )
                                            }}
                                        </td>
                                        <td>
                                            {{ $currentCustomer->mobile_number  }}
                                        </td>
                                        <td>
                                            {{ $overdueDate }}
                                        </td>
                                        <td>
                                            <form action="{{route('notify.overdue')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="overdue_date" value="{{$overdueDate}}">
                                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                                <input type="hidden" name="customer_id" value="{{$currentCustomer->id}}">
                                                <input type="submit" name="submit" value="Send Notification" class="btn btn-primary">
                                            </form>
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
