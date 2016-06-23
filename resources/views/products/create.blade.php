@extends ('onecol')

@section ('content')
<h1>Create a new product here</h1>

{!! Form::open(array('url' => 'products')) !!}
    
    {!! Form::hidden('user_id', 2) !!}
    @include('products.partials.form', array('submitButtonText' => 'Add Product') )
    
{!! Form::close() !!}

@include('errors.list')

@stop()