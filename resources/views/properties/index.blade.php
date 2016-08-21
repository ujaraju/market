@extends('layouts.default')

@section('title', 'title tag of the page')

@section('helper')
{{-- filter go here --}}
	@include('properties.partials.helper')	
@stop

@section('hero')
{{-- hero go here --}}
@stop

@section('page-title')
{{-- page-title go here --}}
Properties List
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