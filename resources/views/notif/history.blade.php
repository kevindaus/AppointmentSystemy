@extends('layouts.app', [
    'namePage' => 'Notif History',
    'namePageLink' => route('notify.history'),
    'class' => 'sidebar-mini',
    'activePage' => 'notify.history',
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
                            <table class="table" id="notif-table">
                                <thead class=" text-primary">
                                <th>
                                    #
                                </th>
                                <th>
                                    Recipient
                                </th>
                                <th>
                                    Response
                                </th>
                                <th>
                                    Date
                                </th>
                                </thead>
                                <tbody>
                                @foreach($smsHistory as $currentSmsHistory)
                                    <tr>
                                        <td>
                                            {{ $currentSmsHistory->id  }}
                                        </td>
                                        <td>
                                            {{ $currentSmsHistory->recipient  }}
                                        </td>
                                        <td>
                                            {{ $currentSmsHistory->response  }}
                                        </td>
                                        <td>
                                            {{ $currentSmsHistory->created_at->format("F d.Y")  }}
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
            $('#notif-table').DataTable();
        });
    </script>
@endpush
