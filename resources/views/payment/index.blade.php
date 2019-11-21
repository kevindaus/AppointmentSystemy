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
                                Staffs
                            </p>
                            <a href="{{route('staffs.create')}}" class="btn btn-sm btn-primary float-right">
                                Add new
                            </a>
                            <div class="clearfix"></div>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table" id="payment-table">
                                <thead class=" text-primary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Action
                                </th>
                                </thead>
                                <tbody>
                                @foreach($allStaff as $currentStaff)
                                    <tr>
                                        <td>
                                            {{ $currentStaff->getFullName()  }}
                                        </td>
                                        <td>
                                            <a href="{{route('staffs.edit',['staff'=>$currentStaff])}}">Update</a> |
                                            <a href="#" class="delete-staff-link">Delete</a>
                                            <form class="{{$currentStaff->id}}_delete"
                                                  action="{{route('staffs.destroy',['staff'=>$currentStaff->id])}}"
                                                  method="POST">
                                                @csrf
                                                @method('delete')
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
