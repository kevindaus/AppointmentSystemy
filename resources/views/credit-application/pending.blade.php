@extends('layouts.app', [
'namePage' => 'Pending Credit Applications',
'namePageLink' => route('credit-applications.pending'),
'class' => 'sidebar-mini',
'activePage' => 'credit_application',
'backgroundImage' => "/images/honda_logo.png",
])
@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#pending-application-table').DataTable();
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
                        <h4 class="card-title">
                            <p class="float-left mt-2">
                                Pending : Waiting for Branch Manager Approval
                            </p>
                            <div class="clearfix"></div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="pending-application-table">
                                <thead class=" text-primary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Basic Income
                                </th>
                                <th>
                                    Source of Income
                                </th>
                                <th>
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($pendingApplication as $currentPendingApplication)
                                    <tr>
                                        <td>
                                            {{ $currentPendingApplication->customer->getFullName()  }}
                                        </td>
                                        <td>
                                            P {{ number_format(floatval($currentPendingApplication->customer->basic_income),2)  }}
                                        </td>
                                        <td>
                                            P {{ number_format(floatval($currentPendingApplication->customer->source_of_income),2)  }}
                                        </td>
                                        <td>
                                            <a href="{{route('credit-applications.show',['credit_application'=>$currentPendingApplication])}}">View</a>
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
