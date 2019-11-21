@extends('layouts.app', [
    'namePage' => 'Home',
    'namePageLink' => route('home'),
    'activePage' => 'application_form',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">Search customer</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mr-auto">
                    <br>
                    <div class="card card-signup">
                        <div class="card-header  text-center">
                            <h1>Step 2 of 9</h1>
                        </div>
                        <div class="card-body ">
                            @include('alerts.success')
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{route('search_customer')}}" method="GET" class="col-6">
                                        @csrf

                                        <div class="input-group no-border">
                                            <input type="text" class="form-control" placeholder="Type name and press Enter" value="{{ request()->get('name') ?? "" }}" name="name">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                    @if(session()->has('name'))
                                        Search result : {{session()->get('name')}}
                                    @endif
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customers as $current_customer)
                                            <tr>
                                                <td>{{$current_customer->getFullName()}}</td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                       href="{{route('show_credit_application',['customer'=>$current_customer])}}">
                                                        Select <i class="fa fa-chevron-circle-right"></i>
                                                    </a>
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
        </div>
    </div>
@endsection

