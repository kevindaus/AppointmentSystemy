@extends('layouts.app', [
    'namePage' => 'Credit Applications',
    'namePageLink' => route("credit-applications.index"),
    'class' => 'sidebar-mini',
    'activePage' => 'credit_application',
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
                        <h4 class="card-title">View Credit Application of <a
                                href="{{route('customers.show',['customer'=>$credit_application->customer()->first()])}}"> {{$credit_application->customer()->first()->getFullName()}} </a></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if( $credit_application->application_status == \App\CreditApplication::STATUS_PENDING )
                                <a class="btn btn-lg btn-info float-left"
                                   href="{{route('credit-applications.approve',['credit_application'=>$credit_application])}}">Approve</a>
                                <a class="btn btn-lg btn-warning float-right"
                                   href="{{route('credit-applications.deny',['credit_application'=>$credit_application])}}">Deny</a>
                            @else
                                <h1>
                                    Application Status : {{$credit_application->application_status}}
                                </h1>
                            @endif
                            <div style="margin: 50px auto" class="clearfix"></div>
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td> Product</td>
                                    <td>
                                        <a href="{{route('products.show',['product'=> $credit_application->product() ])}}">{{$credit_application->product()->name }}</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Basis</td>
                                    <td>{{$credit_application->basis}}</td>
                                </tr>
                                <tr>
                                    <td> Terms</td>
                                    <td>{{$credit_application->terms}}</td>
                                </tr>
                                <tr>
                                    <td> Options</td>
                                    <td>{{$credit_application->options}}</td>
                                </tr>
                                <tr>
                                    <td> Due Date</td>
                                    <td>{{ $credit_application->due_date ? $credit_application->due_date->format("F d,Y"):"" }}</td>
                                </tr>
                                <tr>
                                    <td> Request Due Date</td>
                                    <td>{{ $credit_application->request_due_date ?  $credit_application->request_due_date->format("F d,Y"):""}}</td>
                                </tr>
                                <tr>
                                    <td> ADP</td>
                                    <td>{{$credit_application->adp}}</td>
                                </tr>
                                <tr>
                                    <td> ADP MA</td>
                                    <td>{{$credit_application->adp_ma}}</td>
                                </tr>
                                <tr>
                                    <td> ADP Rebate</td>
                                    <td>{{$credit_application->adp_rebate}}</td>
                                </tr>
                                <tr>
                                    <td> ADP Net</td>
                                    <td>{{$credit_application->adp_net}}</td>
                                </tr>
                                <tr>
                                    <td> Down Payment</td>
                                    <td>{{$credit_application->dp}}</td>
                                </tr>
                                <tr>
                                    <td> Down Payment MA</td>
                                    <td>{{$credit_application->dp_ma}}</td>
                                </tr>
                                <tr>
                                    <td> Down Payment Cropping</td>
                                    <td>{{$credit_application->dp_cropping}}</td>
                                </tr>
                                <tr>
                                    <td> Down Payment Rebate</td>
                                    <td>{{$credit_application->dp_rebate}}</td>
                                </tr>
                                <tr>
                                    <td> Down Payment Net</td>
                                    <td>{{$credit_application->dp_net}}</td>
                                </tr>
                                <tr>
                                    <td> Status of Customer</td>
                                    <td>{{$credit_application->status_of_customer}}</td>
                                </tr>
                                <tr>
                                    <td> Co-Maker</td>
                                    <td>{{$credit_application->co_maker()->getFullName()}}</td>
                                </tr>
                                <tr>
                                    <td>Time Interviewed</td>
                                    <td>{{$credit_application->time_interviewed}}</td>
                                </tr>
                                <tr>
                                    <td>Time Walked In</td>
                                    <td>{{$credit_application->time_walked_in}}</td>
                                </tr>
                                <tr>
                                    <td>Name of Referrer</td>
                                    <td>{{ $credit_application->name_of_referral }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <strong>Staff</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Field Sales</td>
                                    <td>{{$credit_application->getFieldSalesman()->getFullName()}}</td>
                                </tr>
                                <tr>
                                    <td>CI Receiver</td>
                                    <td>{{$credit_application->getCIReceiver()->getFullName()}}</td>
                                </tr>
                                <tr>
                                    <td>Date Received by CI</td>
                                    <td>{{$credit_application->date_received_by_ci}}</td>
                                </tr>
                                <tr>
                                    <td>Time Received by CI</td>
                                    <td>{{$credit_application->time_received_by_ci}}</td>
                                </tr>
                                <tr>
                                    <td>Correct and Confirmed</td>
                                    <td>{{$credit_application->getCorrectAndConfirm()->getFullName() }}</td>
                                </tr>
                                <tr>
                                    <td>Distance from office</td>
                                    <td>{{$credit_application->distance_from_office}}</td>
                                </tr>
                                <tr>
                                    <td>Time away from office</td>
                                    <td>{{$credit_application->time_away_from_office}}</td>
                                </tr>
                                <tr>
                                    <td>Processing Time</td>
                                    <td>{{$credit_application->processing_time}}</td>
                                </tr>
                                <tr>
                                    <td>Estimated Time to Release </td>
                                    <td>{{$credit_application->estimated_time_to_release}}</td>
                                </tr>
                                <tr>
                                    <td> Location </td>
                                    <td>
                                        <div id="map" style="height: 500px; margin-top: 50px"></div>
                                    </td>
                                </tr>

                                <tr>
                                    <td> Branch Manager </td>
                                    <td>{{$credit_application->getBranchManager()->getFullName()}}</td>
                                </tr>
                                <tr>
                                    <td>Recommendation of branch manager</td>
                                    <td>{{$credit_application->recommendation_of_branch_manager}}</td>
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
@push('js')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // var latlng = L.latLng(16.519007, -121.180939); // defaults to solano church
            var map = L.map('map').setView([{{$credit_application->map_location_latitude  }}, {{$credit_application->map_location_longitude}} ], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            let marker = L.marker([{{$credit_application->map_location_latitude  }}, {{$credit_application->map_location_longitude}}],{
                draggable:false
            }).addTo(map)
                .bindPopup('Customers house')
                .openPopup();


        });
    </script>
@endpush

