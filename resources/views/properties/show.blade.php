@extends('layouts.default')

@section('title', $property->title)

@section('helper')
{{-- filter go here --}}
@stop

@section('hero')
{{-- hero go here --}}
		@unless ($property->images->isEmpty())
			<ul class="list-inline">
			@foreach( $property->images as $image)
				{{-- <li><img src="{{ url('/').$image->path }}"></li> --}}
				<li><img src="{{ $image->path }}" class="img-responsive"></li>
			@endforeach
			</ul>
		@endunless
@stop

@section('page-title')
	{{-- page-title go here --}}
	<h1>{{$property->title}}</h1>
@stop

@section('content')
{{-- contents go here --}}
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

@section('footer')
{{-- additional footer content go here eg: javascript --}}
@stop



