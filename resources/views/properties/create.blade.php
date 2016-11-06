@extends('layouts.default')

@section('title', 'Add new property')

@section('helper')
{{-- filter go here --}}
@stop



@section('content')
    <h3 class="m-t-1">Add new property</h3>

    {{-- contents go here --}}
	{!! Form::open(array('url' => 'properties', 'files'=>true)) !!}
	    
	    @include('properties.partials.form', array('submitButtonText' => 'Add Property') )
	    
	{!! Form::close() !!}


    
@stop


@section('footer')
{{-- additional footer content go here eg: javascript --}}
        <script>
        //initWizard();// tab wizard

        google.maps.event.addDomListener(window, 'load', initAddress )

        function initAddress(){
            var pos = { lat: 27.7172, lng: 85.3240 }; //default location KATHMANDU
            var map = new google.maps.Map(
                document.getElementById('map-canvas'), {
                    center: pos,
                    zoom: 15
                }
            );



        var autocomplete = new google.maps.places.Autocomplete(
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
        autocomplete.bindTo('bounds', map);


            var marker = new google.maps.Marker({
                position: pos,
                map: map,
                draggable: true
            });        
        
            autocomplete.addListener('place_changed', function() {
                  //infowindow.close();
                  marker.setVisible(false);
                  var place = autocomplete.getPlace();
                  

                  if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                  }


                 // If the place has a geometry, then present it on a map.
                  if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                  } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                  }


                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

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
