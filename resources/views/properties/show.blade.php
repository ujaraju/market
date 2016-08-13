@extends ('layouts.app')


@section('title', $property->title)

@section ('page-title')
	{{$property->title}}
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