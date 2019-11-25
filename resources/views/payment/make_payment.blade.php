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
                    </div>
                    <div class="card-body">
                        @include('alerts.success')
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <legend>Make Payment</legend>
                                <form method="POST"
                                      action="{{ route('payment.store') }}"
                                      class="row text-left">
                                    @csrf
                                    {!! form($paymentForm) !!}
                                </form>
                            </div>
                            <div class="col-1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection


@push('js')
    <script type="text/javascript">
        jQuery("select[name='sale_id']").selectize({});
    </script>

@endpush
