@extends('layouts.default')

@section('title', 'Home')

@section('hero')
{{-- hero go here --}}
	<ul class="list-unstyled">
		<li><img src="{{url('/img/kathmandu3.jpg')}}" class="img-responsive"></li>
		<li><img src="{{url('/img/kathmandu4.jpg')}}" class="img-responsive"></li>
		<li><img src="{{url('/img/kathmandu1.jpg')}}" class="img-responsive"></li>
		<li><img src="{{url('/img/kathmandu2.jpg')}}" class="img-responsive"></li>
	</ul>
	
	<div class="call-to-action text-center">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">	
					<h2 class="p-b-2">Search for your home sweet home at the places you want to dwell.</h2>
				</div>
				<div class="col-sm-6 col-sm-offset-3">		
					@include('layouts.partials.search')
				</div>
			</div>
		</div>
	</div>
	        
@stop

@section('page-title')
{{-- page-title go here --}}
	<div class="text-center m-y-1">
		<h3>LATEST PROPERTIES</h3>
		<h4>Buy or rent your dwelling from thousands of avalable properties.</h4>
	</div>
@stop

@section('content')
{{-- contents go here --}}
	@include('properties.partials.list-latest-properties')
@stop


@section('footer')
{{-- additional footer content go here eg: javascript --}}
<script type="text/javascript">
jQuery(document).ready(function($) {


        $('.hero ul').slick({
        	arrows:false,
        	autoplay:true,
        	speed: 500,
  			fade: true,
  			cssEase: 'linear'
        });

 });       

</script>
@stop


