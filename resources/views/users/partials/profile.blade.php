{{-- in property single view   --}}


@if( Request::is('properties/*') && ! (Request::is('properties/create','properties/*/edit')) ) 

	<div class="media p-y-2">
		<div class="media-left">
			<a href="{{ action('UsersController@show',[$user->id])}}">
				<img class="media-object avatar" src="{{url('/uploads/avatars/'.$user->avatar)}}" alt="">
			</a>
	  	</div>
		<div class="media-body">
			<small>Listed by</small>
	    	<p class="media-heading">
	    		<a href="{{ action('UsersController@show',[$user->id])}}">
	    		{{ $user->name }}
	    		</a>
	    	</p>
	    	<ul class="list-inline list-icon-buttons m-b-0">
	    		<li><a href="mailto:{{$user->email}}"><i class="fa fa-envelope"></i></a></li>
	    		@if ($user->phone != '')
	    			<li><a href="tel:{{$user->phone}}"><i class="fa fa-phone"></i></a></li>
	    		@endif
	    	</ul>
	  	</div>
	</div>

 
@else

<div class="container">	


	<div class="media p-y-3">
		<div class="media-left">
			<img class="media-object avatar" src="{{url('/uploads/avatars/'.$user->avatar)}}" alt="">
	  	</div>
		<div class="media-body">
	    	@if (Auth::check() )
				@if ($user->id == Auth::user()->id )
					<small>
						<a class="" href="{{ action ('UsersController@edit', [$user->id]) }}">Edit Profile</a>
					</small>
				@endif	
			@else
				<small>Listed by</small>
			@endif

	    	<h4 class="media-heading">
	    		{{ $user->name }}
	    	</h4>
	
	    	<ul class="list-inline list-icon-buttons m-b-0">
	    		<li><a href="mailto:{{$user->email}}"><i class="fa fa-envelope"></i></a></li>
	    		@if ($user->phone != '')
	    			<li><a href="tel:{{$user->phone}}"><i class="fa fa-phone"></i></a></li>
	    		@endif
	    	</ul>
	  	</div>
	</div>
</div>

@endif


