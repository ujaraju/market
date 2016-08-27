@extends('layouts.default')

@section('title', $property->title)

@section('helper')
{{-- filter go here --}}
@stop

@section('hero')
{{-- hero go here --}}
	
		@unless ($property->images->isEmpty())
			<ul id="carousel" class="list-inline">
			@foreach( $property->images as $image)
				{{-- <li><img src="{{ url('/').$image->path }}"></li> --}}
				<li><img src="{{ $image->url }}" class="img-responsive"></li>
			@endforeach
			</ul>	
		@endunless
	
@stop

@section('page-title')
	{{-- page-title go here --}}
	<div class="row">
		<div class="col-sm-9">
			<h3>{{$property->title}}</h3>
		</div>
		<div class="col-sm-3 text-right">
			<ul class="list-inline">
				<li><a href="#" class=""> FB </a></li>
				<li><a href="#" class=""> TW </a></li>
				<li><a href="#" class=""> GL </a></li>
			</ul>
		</div>
	</div>
@stop


@section('content')
{{-- contents go here --}}

	<div class="">
		<hr>
		<h4>Rs. {{ number_format ( $property->price ) }}</h4>

		<hr>
	</div>


	

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
			<div class="grid-features">
				<div class="row">
					<div class="col-xs-6">Bed(s): {{ $property->bed + 0 }}</div>
					<div class="col-xs-6">Kitchen(s): {{ $property->kitchen + 0 }}</div>
				
			
					<div class="col-xs-6">Bath(s): {{ $property->bath + 0 }}</div>
					<div class="col-xs-6">Bath(s): {{ $property->bath + 0 }}</div>
				
			
					<div class="col-xs-6">Garage: {{ $property->garage}}</div>
					<div class="col-xs-6">Floor: {{ $property->floor}}</div>
				
			
					<div class="col-xs-6">Use: {{ $property->use}}</div>
				</div>
			</div>
		</div>
	</div>
	
		<hr>

	<div class="row">	
		<div class="col-sm-4">
			<strong>ADDITIONAL FEATURES</strong>
		</div>
		<div class="col-sm-8">
			@if ($property->additional_features != "")
			<div class="grid-features">
				<div class="row">
			  		@foreach(explode('|', $property->additional_features) as $info) 
			    		<div class="col-xs-6">{{$info}}</div>
			    	@endforeach
			  	</div>
			 </div>
			@endif
		</div>
	</div>

		<hr>

	<div class="row">
		<div class="col-sm-4">
			<strong>UTILITIES</strong>
		</div>
		<div class="col-sm-8">
			@if ($property->utilities != "")
			<div class="grid-features">
				<div class="row">
			  		@foreach(explode('|', $property->utilities) as $info) 
			    		<div class="col-xs-6">{{$info}}</div>
			    	@endforeach
			  	</div>
			 </div>
			@endif
		</div>
	</div>

		<hr>

	<div class="row">
		<div class="col-sm-4">
			<strong>AROUND THE PROPERTY</strong>
		</div>
		<div class="col-sm-8">
			@if ($property->around_property != "")
			<div class="grid-features">
				<div class="row">
			  		@foreach(explode('|', $property->around_property) as $info) 
			    		<div class="col-xs-6">{{$info}}</div>
			    	@endforeach
			  	</div>
			 </div>
			@endif
		</div>
	</div>	

@stop

@section('location')
{{-- additional footer content go here eg: javascript --}}
	<div id="map-canvas" style="width:100%; height:300px;" ></div>

@stop


@section('footer')
{{-- additional footer content go here eg: javascript --}}
{{-- additional footer content go here eg: javascript --}}
<script type="text/javascript">

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
       	//Google map
		$('.hero ul').slick({
		  dots: true,
		  infinite: true,
		  speed: 300,
		  slidesToShow: 1,
		  centerMode: true,
		  variableWidth: true,
		  arrows:false,
		  dots:false
		});
       
		
		//slideshow


		//fullscreen slideshow

		 


</script>
@stop