@extends ('layouts.onecol')


@section('title', 'Product Title')

@section ('page-title')
	
@stop

@section ('content')

		
		
		@unless ($product->images->isEmpty())
			<ul class="list-inline">
			@foreach( $product->images as $image)
				<li><img src="{{ url('/').$image->path }}"></li>
			@endforeach
			</ul>
		@endunless
						


	<h1>Single: {{$product->title}}</h1>
	<span class="label label-success">{{ $product->price }}</span>

						
		@unless ($product->categories->isEmpty())
			<ul class="list-inline">
				<li>CATEGORIZED: </li>
			@foreach( $product->categories as $category)

				<li>{{ $category->name }}</li>

			@endforeach
			</ul>
		@endunless
		
		
		@include('products.partials.editlink')

	<article>
		<p>{{ $product->description }}</p>
	</article>

@stop