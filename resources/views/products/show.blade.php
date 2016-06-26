@extends ('layouts.onecol')


@section('title', 'Product Title')

@section ('page-title')
	
@stop

@section ('content')
	<h1>Single: {{$product->title}}</h1>
	<span class="label label-success">{{ $product->price }}</span>

	<article>
		<p>{{ $product->description }}</p>
	</article>

@stop