@extends('layouts.default')

@section('title', 'Home')

@section('helper')
{{-- filter go here --}}
@stop

@section('hero')
{{-- hero go here --}}
	<ul class="list-unstyled">
		<li><img src="{{url('/img/kathmandu3.jpg')}}" class="img-responsive"></li>
		<li><img src="{{url('/img/kathmandu4.jpg')}}" class="img-responsive"></li>
		<li><img src="{{url('/img/kathmandu1.jpg')}}" class="img-responsive"></li>
		<li><img src="{{url('/img/kathmandu2.jpg')}}" class="img-responsive"></li>
	</ul>
	
	@include('layouts.partials.search')

	        
@stop

@section('page-title')
{{-- page-title go here --}}
	<div class="text-center">
		<h2>LATEST PROPERTIES</h2>
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


