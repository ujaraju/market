@extends ('layouts.twocol')

@section ('sidebar')
	@include('users.partials.sidebar')
@stop

@section ('content')
	<h1>Welcome : {{ $user->name }}</h1>

	{{--get all the products by this user--}} 
	<div class="row">
		{{-- {{ $user->products }}  --}}

		@foreach( $products as $product)
			@include('products.partials.list')
		@endforeach
	</div>

@stop
