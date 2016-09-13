@extends('layouts.app')

@section('main')
		
		<div class="hero border-bottom">
			@include('users.partials.profile')
	    </div>

	    <div class="main"> {{--for all pages--}}
	    	
		    	
		    	
		    		@yield('page-title')
		    		
		    		<div class="container p-y-2">
		    			@yield('content')
		    		</div>
		    	
	    	
	    </div>

	    {{--for property/contact pages--}}
	    @yield('location')
	    
        
@endsection
