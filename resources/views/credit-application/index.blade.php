@extends('layouts.app', [
    'namePage' => 'Credit Applications',
    'namePageLink' => route('credit-applications.index'),
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
                        <h4 class="card-title">
                            <p class="float-left mt-2">
                                Credit Applications
                            </p>
                            <a href="{{route('credit-applications.pending')}}" class="btn btn-sm btn-primary float-right">
                                Pending Approval
                            </a>
                            <div class="clearfix"></div>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table-info">
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
                                    Application Status
                                </th>
                                <th>
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($creditApplications as $currentCreditApplication)
                                    <tr>
                                        <td>
                                            {{ $currentCreditApplication->customer->getFullName()  }}
                                        </td>
                                        <td>
                                            P {{ number_format(floatval($currentCreditApplication->customer->basic_income),2)  }}
                                        </td>
                                        <td>
                                            {{ $currentCreditApplication->customer->source_of_income ?? "Not Specified"  }}
                                        </td>
                                        <td>
                                            {{ $currentCreditApplication->application_status  }}
                                        </td>
                                        <td>
                                            <a href="{{route('credit-applications.show',['credit_application'=>$currentCreditApplication])}}">View</a>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#table-info').DataTable();
        });
    </script>
@endpush
