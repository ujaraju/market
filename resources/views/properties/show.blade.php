@extends('layouts.default')

@section('title', $property->title)


@section('hero')
{{-- hero go here --}}
	
		@unless ($property->images->isEmpty())
			<ul id="carousel" class="list-inline">
			@foreach( $property->images as $image)
				@if( $image->name !="" )
					<li><img src="{{ url('/uploads/properties/medium/')."/".$image->name }}"></li>
				@else
					<li><img src="{{ $image->url }}" class="img-responsive"></li>
				@endif
			@endforeach
			</ul>	
		@endunless
	
@stop

@section('page-title')
	{{-- page-title go here --}}
	<div class="row">


		<div class="col-sm-8 m-b-2 col-sm-push-4 col-md-push-4">
			
			<h3 class="m-b-1">{{$property->title}}</h3>
			
			<div class="row">
				<div class="col-xs-6">

                    @unless ($property->categories->isEmpty())
                        @foreach( $property->categories as $category)
                            
                            @if( $category->id == 1) {{--1 = rent, 2 = sale --}}
                            	<h4>Rs. {{ number_format ( $property->price ).'/mth' }}</h4>
                            @else
                            	<h4>Rs. {{ number_format ( $property->price )}}</h4>
                            @endif

                        @endforeach
                    @endunless


					
				</div>
				<div class="col-xs-6">
					<ul class="list-inline list-icon-buttons m-a-0">
						<li>Share this on</li>
						<li><a href="#" class=""> <i class="fa fa-facebook"></i> </a></li>
						<li><a href="#" class=""> <i class="fa fa-twitter"></i> </a></li>
						<li><a href="#" class=""> <i class="fa fa-google"></i> </a></li>
					</ul>
				</div>
			</div>	

		</div>

		
			<hr class="visible-xs">
		

		<div class="col-sm-4 m-b-2 col-sm-pull-8 col-md-pull-8">

			<div class="media">
				<div class="media-left">
					<a href="#">
						<img class="media-object" src="{{url('/uploads/users/andrew.png')}}" alt="">
					</a>
			  	</div>
				<div class="media-body">
					<small>Seller</small>
			    	<p class="media-heading">
			    		{{ $user->name }}
			    	</p>
			    	<ul class="list-inline list-icon-buttons m-b-0">
			    		<li><a href="#"><i class="fa fa-envelope"></i></a></li>
			    		<li><a href="#"><i class="fa fa-phone"></i></a></li>
			    	</ul>
			  	</div>
			</div>

		</div>


	</div>
@stop


@section('content')
{{-- contents go here --}}

	
		<div class="row text-center row-outlined m-b-2">
			<div class="col-xs-6 col-sm-4 col-md-2 p-y-1">
				<h2>{{$property->plot_area+0}}</h2>
				<small>PLOT Sq.M</small>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-2 p-y-1">
				<h2>{{$property->size_area+0}}</h2>
				<small>SIZE Cu.M</small>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-2 p-y-1">
				<h2>{{$property->built_year}}</h2>
				<small>BUILT YEAR</small>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-2 p-y-1">
				<h2>{{$property->levels+0}}</h2>
				<small>LEVELS</small>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-2 p-y-1">
				<h2>{{$property->bed+0}}</h2>
				<small>BED(S)</small>
			</div>
			<div class="col-xs-6 col-sm-4 col-md-2 p-y-1">
				<h2>{{$property->bath+0}}</h2>
				<small>BATH(S)</small>
			</div>
		</div>
	

	

	<div class="row">
		<div class="col-sm-4">
			<h5 class="m-a-0 m-b-1">DESCRIPTION</h5>
		</div>
		<div class="col-sm-8">
			<p>{{ $property->description }}</p>
		</div>
	</div>	

		<hr>

	<div class="row">
		<div class="col-sm-4">
			<h5 class="m-a-0 m-b-1">FEATURES</h5>
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
			<h5 class="m-a-0 m-b-1">ADDITIONA FEATURES</h5>
		</div>
		<div class="col-sm-8">
			@if ($property->additional_features != "")
			<div class="grid-features">
				<div class="row">
			  		@foreach(explode(',', $property->additional_features) as $info) 
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
			<h5 class="m-a-0 m-b-1">UTILITIES</h5>
		</div>
		<div class="col-sm-8">
			@if ($property->utilities != "")
			<div class="grid-features">
				<div class="row">
			  		@foreach(explode(',', $property->utilities) as $info) 
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
			<h5 class="m-a-0 m-b-1">AROUND THE PROPERTY</h5>
		</div>
		<div class="col-sm-8">
			@if ($property->around_property != "")
			<div class="grid-features">
				<div class="row">
			  		@foreach(explode(',', $property->around_property) as $info) 
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