@extends ('layouts.app')

	@section ('content')
	
	<h1>Properties List</h1>

	<div class="row">
		@foreach( $properties as $property)
			@include('properties.partials.list')
		@endforeach
	</div>

	@stop()


	@section ('footer')
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q"
	  type="text/javascript"></script>
	@stop
