@extends ('layouts.onecol')

	@section ('content')
	
	<h1>Product List</h1>

	<div class="row">
		@foreach( $products as $product)
			@include('products.partials.list')
		@endforeach
	</div>

@stop()


