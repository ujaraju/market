@extends('layouts.default')

@section('title', 'Search Result for: '.$searchTerm)

@section('helper')
{{-- filter go here --}}
	@include('properties.partials.helper')	
@stop

@section('page-title')
	<div class="container">
		@if( !empty($searchTerm) )
			<h4 class="p-y-1">Dwelling(s) near : {{ $searchTerm }}</h4>
		@else
			<h4 class="p-y-1">Dwelling(s)</h4>
		@endif
	</div>
@stop

@section('content')
	<div class="row">
		@foreach( $properties as $property)
			
			@include('properties.partials.list')
			
		@endforeach
	</div>
@stop

@section('footer')
{{-- additional footer content go here eg: javascript --}}
@stop