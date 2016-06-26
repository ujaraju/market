@extends ('layouts.onecol')

@section ('content')
<h1>Create a new product here</h1>

{!! Form::open(array('url' => 'products')) !!}
    
    @include('products.partials.form', array('submitButtonText' => 'Add Product') )
    
{!! Form::close() !!}

@include('errors.list')

@stop()