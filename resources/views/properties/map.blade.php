@extends('layouts.map')

@section('title', 'title tag of the page')

@section('helper')
{{-- filter go here --}}
	@include('properties.partials.helper')	
@stop

@section('hero')
{{-- hero go here --}}
@stop

@section('page-title')
{{-- page-title go here --}}
@stop

@section('content')


        <div id="map-canvas" style="width:100%; height:500px;"></div>

@stop

@section('footer')
{{-- additional footer content go here eg: javascript --}}
        <script>
        google.maps.event.addDomListener(window, 'load', initProperties )

        function initProperties(){

            var pos = { lat: 27.7172, lng: 85.3240 }; //default location KATHMANDU
            var map = new google.maps.Map(
                document.getElementById('map-canvas'), {
                    center: pos,
                    zoom: 14
                }
        
        	);

            //address searchbox stuffs  
            var searchBox = new google.maps.places.SearchBox(document.getElementById('whereTo'));
            google.maps.event.addListener(searchBox, 'places_changed', function() {
                var places = searchBox.getPlaces();
                var bounds = new google.maps.LatLngBounds();
                var i, place;

                for (i = 0; place = places[i]; i++) {
                    bounds.extend(place.geometry.location);
                    marker.setPosition(place.geometry.location);
                }

                map.fitBounds(bounds);
                map.setZoom(14);

            });

            

            var properties = {!! $properties !!};

    

			var infowindow = new google.maps.InfoWindow;

			var marker, i;



			for (i = 0; i < properties.length; i++) { 

			    marker = new google.maps.Marker({
			         position: new google.maps.LatLng(properties[i].lat, properties[i].lng),
			         map: map
			    });

			    google.maps.event.addListener(marker, 'click', (function(marker, i) {

                var infoContent = 
                                    properties[i].title+ "<br>" +
                                    properties[i].price+ "<br>" 

                                    ;

			         return function() {
			             infowindow.setContent( infoContent );
			             infowindow.open(map, marker);
			         }
			    })(marker, i));
			}


       	}
       



</script>
@stop