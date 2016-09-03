<div class="footer p-y-3 text-center">
    <div class="container">
    	
        
    		<div class="links">
    			<ul class="list-inline">
    			    <li><a href="<?php echo url('about'); ?>">About</a></li>
    			    <li><a href="<?php echo url('contact'); ?>">Help</a></li>
    			    <li><a href="<?php echo url('about'); ?>">Contact</a></li>
    			    <li><a href="<?php echo url('contact'); ?>">Terms</a></li>
    			</ul>
    		</div>
            
            <div class="p-y-3">
                <p>Follow us on</p>
                <ul class="list-inline list-icon-buttons">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>

    		<address>
    			© Copyright 2013
    		</address>
    		

    </div>
</div>


{{-- this JS applioes to all the pages in the application --}}
    <script src="{{ url(elixir('js/all.js')) }}"></script>
    {{-- Google map api with places library --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyGlt5bb-aJdkbMZAOGAMhMHQ5ZUGPL0s&libraries=places" type="text/javascript"></script>

    @if(! Request::is('properties/map') )
        <script>
            function initWhereTo() {
                    // Create the autocomplete object, restricting the search to geographical
                    // location types.
                    autocomplete = new google.maps.places.Autocomplete(
                        /** @type {!HTMLInputElement} */(document.getElementById('whereTo')),
                        {types: ['geocode']});

                    // When the user selects an address from the dropdown, populate the address
                    // fields in the form.
                    autocomplete.addListener('place_changed');
            }
            google.maps.event.addDomListener(window, 'load', initWhereTo )
        </script>
    @endif
{{-- this JS applioes to all the pages in the application --}}

@yield ('footer')
