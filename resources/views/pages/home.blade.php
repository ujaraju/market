@extends('layouts.default')

@section('title', 'Home')

@section('filters')
{{-- filter go here --}}
@endsection

@section('hero')
{{-- hero go here --}}
	<ul id="homeslideshow" class="list-unstyled">
		<li><img src="{{url('/img/kathmandu3.jpg')}}" class="img-responsive"></li>
		<li><img src="{{url('/img/kathmandu4.jpg')}}" class="img-responsive"></li>
		<li><img src="{{url('/img/kathmandu2.jpg')}}" class="img-responsive"></li>
	</ul>
@endsection

@section('page-title')
{{-- page-title go here --}}
	<div class="text-center">
		<h2>LATEST PROPERTIES</h2>
		<h4>Buy or rent your next dwelling from thousands of available properties.</h4>
	</div>
@endsection

@section('content')
    @include('properties.partials.list-latest-properties')
@endsection
