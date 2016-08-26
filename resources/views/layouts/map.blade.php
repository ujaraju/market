@extends('layouts.app')

@section('main')
		
		<div class="container">
			@yield ('helper') {{--for product list/map page--}}
		</div>

	    <div class="main"> {{--for all wide pages--}}		    	
			<div class="content">
		    	@yield('content')
			</div>
	    </div>
        
@endsection
