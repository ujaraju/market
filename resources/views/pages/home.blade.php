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
					<h2 class="p-b-2">Your <i>home sweet home</i> is only a few clicks away</h2>
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
	<div class="text-center p-t-1 m-y-2">
		<h3 class="m-b-1">LATEST PROPERTIES</h3>
		<h4>Buy your dwelling from thousands of avalable properties.</h4>
	</div>
@stop

@section('content')
{{-- contents go here --}}
	@include('properties.partials.list-latest-properties')

	<div class="text-center m-y-2">
		<a class="btn btn-default" href="{{url('/properties')}}">View All</a>
	</div>
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


