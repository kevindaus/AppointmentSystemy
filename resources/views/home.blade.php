@extends('layouts.app', [
    'namePage' => 'Dashboard',
    'namePageLink' => route('home'),
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'home',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-sm">
    </div>
    <div class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header ">
                        <h5 class="card-category"></h5>
                        <h4 class="card-title">Credit Applications</h4>
                    </div>
                    <div class="card-body ">
                        <div class="table-responsive ">
                            <table class="table">
                                <thead class=" text-primary">
                                <td>
                                    Name
                                </td>
                                <td>
                                    Date Applied
                                </td>
                                <td class="text-center">
                                    Action
                                </td>
                                </thead>
                                <tbody>
                                @foreach($pending_application as $current_pending_application)
                                <tr>
                                    <td>
                                        {{$current_pending_application->customer()->first()->getFullName()}}
                                    </td>
                                    <td>
                                        {{$current_pending_application->created_at->format("F d,Y") }}
                                    </td>
                                    <td>
                                        <a href="{{route('credit-applications.show',['credit_application'=>$current_pending_application])}}">View</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer ">
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Staff</h4>
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
                                </thead>
                                <tbody>
                                @foreach($staffs as $current_staff)
                                <tr>
                                    <td>
                                        {{$current_staff->getFullName()}}
                                    </td>
                                    <td>
                                        {{$current_staff->phone_number}}
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

@push('js')
    <script>
        $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

        });
    </script>
@endpush
