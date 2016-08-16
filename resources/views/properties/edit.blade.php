@extends ('layouts.app')

	@section ('page-title') Edit: {{ $property->title }} @stop

	@section ('content')


	{!! Form::model($property, array ('method' => 'PATCH', 'action' => ['PropertiesController@update', $property->id], 'files'=>true)) !!}
	    
	    @include('properties.partials.form', array('submitButtonText' => 'Update Product') )

	{!! Form::close() !!}


	@stop()


	@section ('footer')
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q"
	  type="text/javascript"></script>
	@stop