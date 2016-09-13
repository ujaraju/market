@extends('layouts.default')

@section('title', 'Add new property')

@section('helper')
{{-- filter go here --}}
@stop



@section('content')
    <h3>Add new property</h3>

    {{-- contents go here --}}
	{!! Form::open(array('url' => 'properties', 'files'=>true)) !!}
	    
	    @include('properties.partials.form', array('submitButtonText' => 'Add Property') )
	    
	{!! Form::close() !!}


    
@stop


@section('footer')
{{-- additional footer content go here eg: javascript --}}
        <script>
        initWizard();// tab wizard

        google.maps.event.addDomListener(window, 'load', initAddress )

        function initAddress(){
            var pos = { lat: 27.7172, lng: 85.3240 }; //default location KATHMANDU
            var map = new google.maps.Map(
                document.getElementById('map-canvas'), {
                    center: pos,
                    zoom: 15
                }
            );

            //var infoWindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                draggable: true
            });

            //address searchbox stuffs  
            var searchBox = new google.maps.places.SearchBox(document.getElementById('address'));
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;

                for (i = 0; place = places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }

                map.fitBounds(bounds);
                map.setZoom(15);


            });

            google.maps.event.addListener(marker, 'position_changed', function() {
                var lat = marker.getPosition().lat();
                var lng = marker.getPosition().lng();

                $("#lat").val(lat);
                $("#lng").val(lng);
            });
        }
        </script>

@stop
