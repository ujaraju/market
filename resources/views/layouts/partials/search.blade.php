{{-- if this is home --}}
@if(Request::is('/'))  

	<div class="input-group">		
		{!! Form::text('whereTo', null, array('id'=>'whereTo','class' => 'form-control','placeholder'=>'Where to?')) !!}
		<div class="input-group-btn">
			<button class="btn btn-success">Search</button>
		</div>	
	</div>


@else
	<div class="navbar-form pull-left">
	    <div class="input-group">
	        {!! Form::text('whereTo', null, array('id'=>'whereTo','class' => 'form-control','size'=>'40','placeholder'=>'Where to?')) !!}
	        <div class="input-group-btn">
	            <button class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
	        </div>
	    </div>
	</div>
@endif





