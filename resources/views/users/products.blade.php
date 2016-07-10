@extends ('layouts.twocol')

@section ('sidebar')
	@include('users.partials.sidebar')
@stop

@section ('content')
	<h1>Products : <a href="{{ url('/products/create') }}">Add New Product</a> </h1>

	{{--get all the products by this user--}} 
	<div class="row">
		{{-- {{ $user->products }} //use this for angular.js --}}
		@foreach( $user->products as $product)
			@include('products.partials.list')
		@endforeach
	</div>

@stop
