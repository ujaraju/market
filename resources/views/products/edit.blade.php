@extends ('layouts.twocol')

@section ('sidebar')
	@include('users.partials.sidebar')
@stop

@section ('content')

<h1>Edit: {{ $product->title }}</h1>

{!! Form::model($product, array ('method' => 'PATCH', 'action' => ['ProductsController@update', $product->id], 'files'=>true)) !!}
    
    @include('products.partials.form', array('submitButtonText' => 'Update Product') )

{!! Form::close() !!}


@stop()