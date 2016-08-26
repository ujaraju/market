<div class="footer">
    <div class="container">
    	<div class="row">
    		<div class="col-sm-6">
    			<ul class="list-inline">
    			    <li><a href="<?php echo url('about'); ?>">About</a></li>
    			    <li><a href="<?php echo url('contact'); ?>">Contact</a></li>
    			    <li><a href="<?php echo url('about'); ?>">About</a></li>
    			    <li><a href="<?php echo url('contact'); ?>">Contact</a></li>
    			</ul>
    		</div>
    		<div class="col-sm-6">
    			<address class="text-right">
    				© Copyright 2013
    			</address>
    		</div>
    	</div>
    </div>
</div>




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


    
@yield ('footer')
