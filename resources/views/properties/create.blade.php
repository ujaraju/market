@extends('layouts.default')

@section('title', 'Create a new property')

@section('helper')
{{-- filter go here --}}
@stop

@section('hero')
{{-- hero go here --}}
@stop

@section('page-title')
{{-- page-title go here --}}
Create a new property
@stop

@section('content')
{{-- contents go here --}}
	{!! Form::open(array('url' => 'properties', 'files'=>true)) !!}
	    
	    @include('properties.partials.form', array('submitButtonText' => 'Add Property') )
	    
	{!! Form::close() !!}
@stop

@section('footer')
{{-- additional footer content go here eg: javascript --}}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyGlt5bb-aJdkbMZAOGAMhMHQ5ZUGPL0s&libraries=places" type="text/javascript"></script>


    <script>


      	var pos = {lat: 27.7172, lng: 85.3240};//default location KATHMANDU
        var map = new google.maps.Map(
        	document.getElementById('map-canvas'),
        	{
          	center: pos,
          	zoom: 15
        	}
        );

        var infoWindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
        		position: pos,
        		map: map,
        		draggable:true 
        });
        	



	
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          	navigator.geolocation.getCurrentPosition(function(position) {
	            var pos = {
	              lat: position.coords.latitude,
	              lng: position.coords.longitude
	            };
            //infoWindow.setPosition(pos);
            marker.setPosition(pos);
            //infoWindow.setContent('Location found.');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation

          handleLocationError(false, infoWindow, map.getCenter());
        }
    




    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
      infoWindow.setPosition(pos);
      infoWindow.setContent(browserHasGeolocation ?
                            'Error: The Geolocation service failed.' :
                            'Error: Your browser doesn\'t support geolocation.');
    }




    //searchbox stuffs  
	var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap')); 
	google.maps.event.addListener(searchBox, 'places_changed', function() 
		{
		    var places = searchBox.getPlaces();
		    var bounds = new google.maps.LatLngBounds();
		    var i, place;
		     
			for (i = 0; place = places[i]; i++) {
				bounds.extend(place.geometry.location);
		        marker.setPosition(place.geometry.location);
		    }
		    
		    map.fitBounds(bounds);
		    map.setZoom(15);

		    
		}
	);
 
	google.maps.event.addListener(marker, 'position_changed', function() 
		{
		    var lat = marker.getPosition().lat();
		    var lng = marker.getPosition().lng();
		    
		    $("#lat").val(lat);
		    $("#lng").val(lng);
		}
	);

    </script>
  
@stop