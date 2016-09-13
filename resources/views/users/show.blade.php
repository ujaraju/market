@extends('layouts.default')

@section('title', $user->name)


@section('hero')
{{-- hero go here --}}
	@include('users.partials.profile')
@stop


@section('content')
{{-- contents go here --}}
	
	
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



