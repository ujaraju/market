@extends('layouts.app')

@section('main')
		
		
		@yield ('helper') {{--for product list/map page--}}
		

		<div class="hero border-bottom">
			@yield ('hero') {{--for home/property/ page--}}
	    </div>

	    <div class="main"> {{--for all pages--}}
	    	
		    	
		    	
		    		@yield('page-title')
		    		
		    		<div class="container p-b-1">
		    			@yield('content')
		    		</div>
		    	
	    	
	    </div>

	    {{--for property/contact pages--}}
	    @yield('location')
	    
        
@endsection
