@extends('layouts.app', [
    'namePage' => 'Staffs',
    'namePageLink' => route('staffs.index'),
    'class' => 'sidebar-mini',
    'activePage' => 'staff',
    'backgroundImage' => "/images/honda_logo.png",
  ])

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#payment-table').DataTable();
        });
    </script>
@endpush
@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        @include('alerts.success')
                        <h4 class="card-title">
                            <p class="float-left mt-2">
                                <a href="{{ route('payment.create') }}" class="btn btn-sm btn-primary">
                                    Make Payment
                                </a>
                            </p>
                            <p class="float-right mt-2">
                                <a href="{{ route('payment.overdue') }}" class="btn btn-sm btn-primary">
                                    Overdue
                                </a>
                            </p>

                            <div class="clearfix"></div>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table" id="payment-table">
                                <thead class=" text-primary">
                                <th>
                                    Customer
                                </th>
                                <th>
                                    Payment
                                </th>
                                <th>Received by</th>
                                <th>
                                    Date
                                </th>
                                </thead>
                                <tbody>
                                @foreach($payments as $currentPayment)
                                    <tr>
                                        <td>
                                            {{ $currentPayment->getCustomer()->getFullName()  }}
                                        </td>
                                        <td>
                                            {{ $currentPayment->amount  }}
                                        </td>
                                        <td>
                                            {{ $currentPayment->getStaff()->getFullName()  }}
                                        </td>
                                        <td>
                                            {{ $currentPayment->date_received->format("F d.Y") }}
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
