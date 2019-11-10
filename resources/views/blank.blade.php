@extends('layouts.app')

@section('content')

    <div class="wrapper">

        @include('partials.sidebar')

        <div class="main-panel">
            @include('partials.top-nav')
            @include('partials.header')
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        @component('partials.card')
                            <h4>Welcome</h4>
                            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                        @endcomponent

                    </div>
                </div>
                @include('partials.footer')
            </div>
        </div>

    </div>


@endsection
