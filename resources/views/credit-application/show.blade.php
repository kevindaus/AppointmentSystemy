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
                        <h4 class="card-title">View Credit Application</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td> Product </td>
                                        <td>
                                            {{$credit_application->product}}
                                            <a href="{{route('products.show',['product'=> $credit_application->product()->first() ])}}">{{$credit_application->product()->first()->name }}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> Basis </td>
                                        <td>{{$credit_application->basis}}</td>
                                    </tr>
                                    <tr>
                                        <td> Terms  </td>
                                        <td>{{$credit_application->terms}}</td>
                                    </tr>
                                    <tr>
                                        <td> Options  </td>
                                        <td>{{$credit_application->options}}</td>
                                    </tr>
                                    <tr>
                                        <td> Due Date  </td>
                                        <td>{{$credit_application->due_date->format("F d,Y")}}</td>
                                    </tr>
                                    <tr>
                                        <td> Request Due Date  </td>
                                        <td>{{$credit_application->request_due_date->format("F d,Y")}}</td>
                                    </tr>
                                    <tr>
                                        <td> ADP  </td>
                                        <td>{{$credit_application->adp}}</td>
                                    </tr>
                                    <tr>
                                        <td> ADP MA </td>
                                        <td>{{$credit_application->adp_ma}}</td>
                                    </tr>
                                    <tr>
                                        <td> ADP Rebate </td>
                                        <td>{{$credit_application->adp_rebate}}</td>
                                    </tr>
                                    <tr>
                                        <td> ADP Net </td>
                                        <td>{{$credit_application->adp_net}}</td>
                                    </tr>
                                    <tr>
                                        <td> Down Payment </td>
                                        <td>{{$credit_application->dp}}</td>
                                    </tr>
                                    <tr>
                                        <td> Down Payment MA </td>
                                        <td>{{$credit_application->dp_ma}}</td>
                                    </tr>
                                    <tr>
                                        <td> Down Payment Cropping </td>
                                        <td>{{$credit_application->dp_cropping}}</td>
                                    </tr>
                                    <tr>
                                        <td> Down Payment Rebate </td>
                                        <td>{{$credit_application->dp_rebate}}</td>
                                    </tr>
                                    <tr>
                                        <td> Down Payment Net </td>
                                        <td>{{$credit_application->dp_net}}</td>
                                    </tr>
                                    <tr>
                                        <td> Status of Customer </td>
                                        <td>{{$credit_application->status_of_customer}}</td>
                                    </tr>
                                    <tr>
                                        <td> Co-Maker </td>
                                        <td>{{$credit_application->co_maker()->first()->getFullName()}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->time_interviewed}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->time_walked_in}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->name_of_referral}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->name_of_field_sale}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->received_by_ci}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->date_received_by_ci}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->time_received_by_ci}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->correct_and_confirmed_by}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->map_location_longitude}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->map_location_latitude}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->distance_from_office}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->time_away_from_office}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->processing_time}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->estimated_time_to_release}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->recommendation_of_branch_manager}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->branch_manager}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->last_payment}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->updated_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>  </td>
                                        <td>{{$credit_application->customer_id}}</td>
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
