@extends ('layouts.twocol')

@section ('sidebar')
	<ul class="list-group">
		<li class="list-group-item active">Cras justo odio</li>
		<li class="list-group-item">Dapibus ac facilisis in</li>
		<li class="list-group-item">Morbi leo risus</li>
		<li class="list-group-item">Porta ac consectetur ac</li>
		<li class="list-group-item">Vestibulum at eros</li>
	</ul>
@stop

@section ('content')
	<h1>Welcome : {{ $user->username }}</h1>

	{{--get all the products by this user--}} 
	<div class="row">
		@foreach( $user->products as $product)
			@include('products.partials.list')
		@endforeach
	</div>

@stop
