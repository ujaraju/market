
<div class="helper">
	<div class="row">
		<div class="col-sm-10">
			<div class="form-inline">
				{{ Form::select('age', ['Under 18', '19 to 30', 'Over 30'], null, array('class' => 'form-control' )) }}

				{{ Form::select('age', ['Under 18', '19 to 30', 'Over 30'], null, array('class' => 'form-control' )) }}
			</div>
		</div>
		<div class="col-sm-2 text-right">
			<div class="btn-group">
				<a class="btn btn-default" href="{{ url('/properties') }}"><i class="glyphicon glyphicon-th-list"></i></a>
				<a class="btn btn-default" href="{{ url('/properties/map') }}"><i class="glyphicon glyphicon-map-marker"></i></a>
			</div>
		</div>
	</div>
</div>
