@extends ('layouts.app')


@section ('content')
	<h1>USER DASHBOARD</h1>

	<h2>Welcome : {{ $user->name }} </h2>
	<p>SOME IMAGE HERE</p>
	{{--get all the products by this user--}} 
	<div class="row">
		{{-- {{ $user->properties }}  --}}

		@foreach( $user->properties as $property)
			@include('properties.partials.list')
		@endforeach

	</div>

@stop
