@extends('layouts.app', [
    'namePage' => 'Sales',
    'namePageLink' => route('sales.index'),
    'class' => 'sidebar-mini',
    'activePage' => 'sale',
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
                        <h4 class="card-title">Sales</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    Customer
                                </th>
                                <th>
                                    Tax
                                </th>
                                <th>
                                    Total Amount
                                </th>
                                <th>
                                    Status
                                </th>
                                </thead>
                                <tbody>
                                @foreach($allSales as $currentSale)
                                    <tr>
                                        <td>
                                            {{ $currentSale->id  }}
                                        </td>
                                        <td>
                                            <a href="{{route('customers.show',['customer'=>$currentSale->getCreditApplication()->customer])}}">
                                                {{ $currentSale->getCreditApplication()->customer->getFullName()  }}
                                            </a>
                                        </td>
                                        <td>
                                            % {{ number_format($currentSale->tax_rate,2) }}
                                        </td>
                                        <td>
                                            P {{ number_format($currentSale->total_amount,2) }}
                                        </td>
                                        <td>
                                            {{ $currentSale->status }}
                                        </td>
                                        <td>
                                            <a href="{{route('sales.show',['sale'=>$currentSale])}}">Other Information</a>
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
