@extends ('layouts.twocol')

@section ('sidebar')
	@include('users.partials.sidebar')
@stop

@section ('content')

<h1>Create a new product here</h1>

{!! Form::open(array('url' => 'products')) !!}
    
    @include('products.partials.form', array('submitButtonText' => 'Add Product') )
    
{!! Form::close() !!}

@stop()