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
                        <h4 class="card-title">Credit Applications</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
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
                                @foreach($creditApplications as $currentCreditApplication)
                                    <tr>
                                        <td>
                                            {{ $currentCreditApplication->customer->getFullName()  }}
                                        </td>
                                        <td>
                                            P {{ number_format(floatval($currentCreditApplication->customer->basic_income),2)  }}
                                        </td>
                                        <td>
                                            P {{ number_format(floatval($currentCreditApplication->customer->source_of_income),2)  }}
                                        </td>
                                        <td>
                                            <a href="edit">Approve</a>
                                            <a href="edit">Deny</a>
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
