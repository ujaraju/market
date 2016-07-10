@extends ('layouts.onecol')


@section('title', 'Product Title')

@section ('page-title')
	
@stop

@section ('content')
	<h1>Single: {{$product->name}}</h1>
	<span class="label label-success">{{ $product->price }}</span>

		{{-- 		
		@unless ($product->categories->isEmpty())
			<ul class="list-inline">
				<li>CATEGORIZED: </li>
			@foreach( $product->categories as $category)

				<li>{{ $category->name }}</li>

			@endforeach
			</ul>
		@endunless
		 --}}
		
		@include('products.partials.editlink')

	<article>
		<p>{{ $product->description }}</p>
	</article>

@stop