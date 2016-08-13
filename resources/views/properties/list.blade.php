@extends ('layouts.app')

	@section('title', 'Properties')

	@section ('page-title') Properties List @stop
	
	@section ('content')
	
		

		<div class="row">
			@foreach( $properties as $property)
				@include('properties.partials.list')
			@endforeach
		</div>

	@stop()


