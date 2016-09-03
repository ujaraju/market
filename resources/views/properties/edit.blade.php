@extends('layouts.default')

@section('title', 'Edit:'.$property->title )

@section('page-title')
{{-- page-title go here --}}
Edit: {{ $property->title }} 
@stop

@section('content')
{{-- contents go here --}}
	{!! Form::model($property, array ('method' => 'PATCH', 'action' => ['PropertiesController@update', $property->id], 'files'=>true)) !!}
	    
	    @include('properties.partials.form', array('submitButtonText' => 'Update Product') )

	{!! Form::close() !!}
@stop


@section('footer')
{{-- additional footer content go here eg: javascript --}}
        <script>
        google.maps.event.addDomListener(window, 'load', initAddress )


        function initAddress(){
        	var plat = parseFloat( $("#lat").val() );
        	var plng = parseFloat( $("#lng").val() );
       

            var pos = { lat: plat, lng: plng }; //default location KATHMANDU
            var map = new google.maps.Map(
                document.getElementById('map-canvas'), {
                    center: pos,
                    zoom: 12
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





