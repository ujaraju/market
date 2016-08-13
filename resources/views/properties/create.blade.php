@extends ('layouts.onecol')


@section ('content')

<h1>Create a new property here</h1>

{!! Form::open(array('url' => 'properties', 'files'=>true)) !!}
    
    @include('properties.partials.form', array('submitButtonText' => 'Add Property') )
    
{!! Form::close() !!}

@stop()

