@extends('layouts.default')

@section('title', 'Edit:'.$property->title )

@section('page-title')
{{-- page-title go here --}}

@stop

@section('content')
<h3 class="m-t-1">Edit: {{ $property->title }} </h3>
{{-- contents go here --}}
    <div class="m-y-1">
	{!! Form::model($property, array ('method' => 'PATCH', 'action' => ['PropertiesController@update', $property->id], 'files'=>true)) !!}
	    
	    @include('properties.partials.form', array('submitButtonText' => 'Update Product') )

	{!! Form::close() !!}
    </div>
@stop


@section('footer')
{{-- additional footer content go here eg: javascript --}}
        <script>
        //initWizard();// tab wizard

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
                    var searchBox = new google.maps.places.Autocomplete(
                        (
                            document.getElementById('address')// input field id
                        ),
                        {   types: ['geocode'],
                            componentRestrictions: 
                                {
                                country: 'np',
                                }
                        }
                    );

                    // When the user selects an address from the dropdown, populate the address
                    // fields in the form.
                    //autocomplete.addListener('place_changed');


            //var searchBox = new google.maps.places.SearchBox(document.getElementById('address'));
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





