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
				<li><img src="{{ $image->path }}" class="img-responsive"></li>
			@endforeach
			</ul>
		@endunless
@stop

@section('page-title')
	{{-- page-title go here --}}
	<h1>{{$property->title}}</h1>
@stop

@section('content')
{{-- contents go here --}}
	<span class="label label-success">{{ $property->price }}</span>
						
		@unless ($property->categories->isEmpty())
			<ul class="list-inline">
				<li>CATEGORIZED: </li>
			@foreach( $property->categories as $category)

				<li>{{ $category->name }}</li>

			@endforeach
			</ul>
		@endunless

	<article>
		<p>{{ $property->description }}</p>
		<p>{{ $property->lat }}</p>
		<p>{{ $property->lng }}</p>
	</article>
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
                    zoom: 12,
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