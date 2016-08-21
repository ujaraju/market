@extends('layouts.app')

@section('main')
		
		<div class="helper">
			<div class="container">
				@yield ('helper') {{--for product list/map page--}}
			</div>
		</div>

		<div class="hero">
			@yield ('hero') {{--for home/property/ page--}}
	    </div>

	    <div class="main"> {{--for all pages--}}
	    	<div class="container">
		    	<div class="page-title">@yield('page-title')</div>
		    	<div class="content">
		    		@yield('content')
		    	</div>
	    	</div>
	    </div>

	    <div class="location-container">{{--for property/contact pages--}}
	    	@yield('location')
	    </div>
        
@endsection
