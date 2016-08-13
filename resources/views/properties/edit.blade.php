@extends ('layouts.onecol')


@section ('content')

<h1>Edit: {{ $property->title }}</h1>

{!! Form::model($property, array ('method' => 'PATCH', 'action' => ['PropertiesController@update', $property->id], 'files'=>true)) !!}
    
    @include('properties.partials.form', array('submitButtonText' => 'Update Product') )

{!! Form::close() !!}


@stop()