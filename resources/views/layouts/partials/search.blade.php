{{-- if this is home --}}
@if(Request::is('/'))  


{!! Form::open(['method'=>'GET','url'=>'search','class'=>'','role'=>'search'])  !!}
<div class="input-group">
    <input type="text" id="whereTo" class="form-control" name="whereTo" placeholder="Where To?">
    <div class="input-group-btn">
        <button class="btn btn-success" type="submit">
        	Search
        </button>
    </div>
</div>
{!! Form::close() !!}


@else


	{!! Form::open(['method'=>'GET','url'=>'search', 'class'=>'navbar-form pull-left'])  !!}
	<div class="input-group">
		<input type="text" id="whereTo" class="form-control" name="whereTo" size="40" placeholder="Where To?">

		<div class="input-group-btn">
	    	<button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
		</div>
	</div>
	{!! Form::close() !!}

@endif





