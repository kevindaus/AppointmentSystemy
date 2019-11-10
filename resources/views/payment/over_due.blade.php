@extends('layouts.app', [
    'namePage' => 'Credit Applications',
    'class' => 'sidebar-mini',
    'activePage' => 'credit-application',
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
                                    Name
                                </th>
                                <th>
                                    Address
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th class="text-right">
                                    Salary
                                </th>
                                <th>
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($overDuecreditApplications as $currentOverdueCreditApplication)
                                    <tr>
                                        <td>
                                            {{ $currentCreditApplication->customer->getFullName()  }}
                                        </td>
                                        <td>
                                            {{ $currentCreditApplication->customer->getFullAddress()  }}
                                        </td>
                                        <td>
                                            Oud-Turnhout
                                        </td>
                                        <td class="text-right">
                                            $36,738
                                        </td>
                                        <td>
                                            herea
                                            <a href="edit">Update</a>
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
