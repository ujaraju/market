@extends('layouts.default')

@section('title', $property->title)

@section('helper')
{{-- filter go here --}}
@stop

@section('hero')
{{-- hero go here --}}
		@unless ($property->images->isEmpty())
			<ul class="list-inline">
			@foreach( $property->images as $image)
				{{-- <li><img src="{{ url('/').$image->path }}"></li> --}}
				<li><img src="{{ $image->url }}" class="img-responsive"></li>
			@endforeach
			</ul>
		@endunless
@stop

@section('page-title')
	{{-- page-title go here --}}
	@unless ($property->categories->isEmpty())
		For: 
		@foreach( $property->categories as $category)
			<span>{{ $category->name }}</span>
		@endforeach
	@endunless
	<h1>{{$property->title}}</h1>

	<span class="label label-success">{{ $property->price }}</span>

@stop



@section('content')
{{-- contents go here --}}
	
	

	<div class="row">
		<div class="col-sm-4">
			<strong>DESCRIPTION</strong>
		</div>
		<div class="col-sm-8">
			<p>{{ $property->description }}</p>
		</div>
	</div>	

		<hr>

	<div class="row">
		<div class="col-sm-4">
			<strong>FEATURES</strong>
		</div>
		<div class="col-sm-8">
			<table class="table-features">
			<tr>
				<td>Bed(s): {{ $property->bed + 0 }}</td>
				<td>Kitchen(s): {{ $property->kitchen + 0 }}</td>
			</tr>
			<tr>
				<td>Bath(s): {{ $property->bath + 0 }}</td>
				<td>Bath(s): {{ $property->bath + 0 }}</td>
			</tr>
			<tr>
				<td>Garage: {{ $property->garage}}</td>
				<td>Floor: {{ $property->floor}}</td>
			</tr>
			<tr>
				<td>Use: {{ $property->use}}</td>
			</tr>
			</table>
		</div>
	</div>
	
		<hr>

	<div class="row">	
		<div class="col-sm-4">
			<strong>ADDITIONAL FEATURES</strong>
		</div>
		<div class="col-sm-8">
			<p>{{ $property->additional_features }}</p>
		</div>
	</div>

		<hr>

	<div class="row">
		<div class="col-sm-4">
			<strong>UTILITIES</strong>
		</div>
		<div class="col-sm-8">
			<p>{{ $property->description }}</p>
		</div>
	</div>

		<hr>

	<div class="row">
		<div class="col-sm-4">
			<strong>AROUND THE PROPERTY</strong>
		</div>
		<div class="col-sm-8">
			<p>{{ $property->description }}</p>
		</div>
	</div>	

@stop

@section('location')
{{-- additional footer content go here eg: javascript --}}
	<div id="map-canvas" style="width:100%; height:300px;" ></div>

@stop


@section('footer')
{{-- additional footer content go here eg: javascript --}}
        <script>
        var plat = {{$property->lat}};
        var plng = {{$property->lng}};

        google.maps.event.addDomListener(window, 'load', propertyLocation )

        function propertyLocation(){
            
            var pos = { lat: plat, lng: plng }; //default location KATHMANDU
            var map = new google.maps.Map(
                document.getElementById('map-canvas'), {
                    center: pos,
                    zoom: 18,
					scrollwheel: false,
					disableDoubleClickZoom: true
                }
        
        	);

			marker = new google.maps.Marker({
				position: new google.maps.LatLng(pos),
			    map: map
			});
       	}
       
</script>
@stop