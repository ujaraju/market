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

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <script src="{{url('/js/sly.min.js')}}" type="text/javascript"></script>
    <script src="{{url('/js/jquery.bxslider.min.js')}}" type="text/javascript"></script>
    <script src="{{url('/js/swelldwell.js')}}" type="text/javascript"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}




    
@yield ('footer')
