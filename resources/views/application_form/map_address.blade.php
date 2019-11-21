@extends('layouts.app', [
    'namePage' => 'Home',
    'namePageLink' => route('home'),
    'activePage' => 'application_form',
    'backgroundImage' => "/images/honda_logo.png",
])

@section('content')
    <div class="panel-header panel-header-md">
        <h1 class="text-white text-center">{{ __('Map Location of Customer') }}</h1>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 mr-auto">
                    <br>
                    <div class="card card-signup text-center">
                        <div class="card-header ">
                            <h1>Step 8 of 9</h1>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')
                            <div class="row">
                                <div class="col-1">
                                </div>
                                <div class="col-10">
                                    <h2>Please drag the marker on the location of your house.</h2>
                                    {{--show map--}}
                                    <div id="map" style="height: 500px; margin-top: 50px"></div>
                                    <form action="{{ route('save_map_address', ['credit_application' => $credit_application, 'customer' => $customer])  }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="longitude" id="longitude" >
                                        <input type="hidden" name="latitude" id="latitude" >
                                        <input type="submit" name="submit" value="submit"  class="btn btn-primary btn-block">
                                    </form>
                                </div>
                                <div class="col-1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // var latlng = L.latLng(16.519007, -121.180939); // defaults to solano church
            //16.518523, 121.180539
            var map = L.map('map').setView([16.518523, 121.180539], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);
            let marker = L.marker([16.518523, 121.180539],{
                draggable:true
            }).addTo(map)
                .bindPopup('Customers house')
                .openPopup();
            marker.dragging.enabled();
            marker.on('dragend', function (eventData) {
                document.querySelector("#longitude").value = marker.getLatLng().lng;
                document.querySelector("#latitude").value =marker.getLatLng().lat;
            });
        });
    </script>
@endpush

