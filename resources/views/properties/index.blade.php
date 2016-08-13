@extends ('layouts.onecol')

	@section ('content')
	
	<h1>Properties List</h1>

	<div class="row">
		@foreach( $properties as $property)
			@include('properties.partials.list')
		@endforeach
	</div>

@stop()


