@extends('layouts.app')
            

@section('main')
    
    @yield('page-title')
    <div class="container">
	    <div class="row">
	        <div class="col-sm-2">
	             @yield('sidebar')
	        </div>
	        <div class="col-sm-10">
	            @yield('content')
	        </div>
	    </div>
    </div>
    
@endsection
