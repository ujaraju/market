@extends ('layouts.onecol')

@section ('content')
<h1>Edit {{ $product->title }}</h1>

{!! Form::model($product, array ('method' => 'PATCH', 'action' => ['ProductsController@update', $product->id] )) !!}
    
    {!! Form::hidden('user_id', 1) !!}
    @include('products.partials.form', array('submitButtonText' => 'Update Product') )

{!! Form::close() !!}

@include('errors.list')

@stop()