@extends('layouts.default')

@section('title', $user->name)

@section('helper')
{{-- filter go here --}}
@stop

@section('hero')
{{-- hero go here --}}
@stop

@section('page-title')
{{-- page-title go here --}}
USER DASHBOARD
@stop

@section('content')
{{-- contents go here --}}
	<h2>Welcome : {{ $user->name }} </h2>
	
	{{--get all the products by this user--}} 
	<div class="row">
		{{-- {{ $user->properties }}  --}}

		@foreach( $properties as $property)
			@include('properties.partials.list')
		@endforeach

	</div>
@stop

@section('footer')
{{-- additional footer content go here eg: javascript --}}
@stop



