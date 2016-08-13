@extends ('layouts.onecol')


@section('title', $property->title)

@section ('page-title')
	
@stop

@section ('content')

		
		@unless ($property->images->isEmpty())
			<ul class="list-inline">
			@foreach( $property->images as $image)
				{{-- <li><img src="{{ url('/').$image->path }}"></li> --}}
				<li><img src="{{ $image->path }}" class="img-responsive"></li>
			@endforeach
			</ul>
		@endunless
						


	<h1>Single: {{$property->title}}</h1>
	<span class="label label-success">{{ $property->price }}</span>
						
		@unless ($property->categories->isEmpty())
			<ul class="list-inline">
				<li>CATEGORIZED: </li>
			@foreach( $property->categories as $category)

				<li>{{ $category->name }}</li>

			@endforeach
			</ul>
		@endunless
		
		@include('properties.partials.editlink')

	<article>
		<p>{{ $property->description }}</p>
	</article>

@stop