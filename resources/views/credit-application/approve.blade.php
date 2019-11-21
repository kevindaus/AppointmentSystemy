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

                                <form method="POST" action="{{ route('credit-applications.save_approval',['credit_application'=>$credit_application]) }}" class="row text-left">
                                    @csrf
                                    <h4>
                                        Finalize purchase of
                                    <a href="{{route('products.show',['product'=>$credit_application->product()])}}"> {{$credit_application->product()->name}}  </a>  amounting to P {{ number_format($credit_application->product()->price,2) }}
                                    by <a href="{{ route('customers.show',['customer'=>$credit_application->customer])  }}">{{ $credit_application->customer->getFullName() }}</a>
                                    </h4>

                                    {!! form($credit_application_approval_form) !!}
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
        $(document).ready(function () {
            let current_total = parseFloat(jQuery("#total_amount").val());

            jQuery('#tax_rate').on('onkeypress', function () {

                let tax_rate = parseFloat(jQuery(this).val());
                let tax_rate_comp = tax_rate / 100;
                let temp = current_total * tax_rate_comp;
                jQuery("#total_amount").val( current_total + temp );
            });
        });
    </script>
@endpush
