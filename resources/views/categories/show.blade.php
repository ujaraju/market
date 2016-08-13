@extends ('layouts.app')

@section('title', 'Category Title')

@section ('page-title')
	<h1>{{ $category->title }}</h1>
@stop

@section ('sidebar')
	@include('categories.components.sidebar')
@stop


@section ('content')
	
	<div class="row">

			<div class="col-xs-6 col-sm-4">
				Show products in this category
			</div>
		
	</div>
	
@stop