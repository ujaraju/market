
<div class="helper">
	<div class="container">
		<div class="row">
			
			<div class="col-xs-6">
				<button class="btn btn-default" data-toggle="collapse" data-target="#filters">
					<i class="fa fa-sliders"></i> Filter
				</button>
			</div>

			<div class="col-xs-6 text-right">
				<div class="btn-group">
				
				
					<a class="btn btn-default" href="{{ url('/properties') }}"><i class="glyphicon glyphicon-th-list"></i> List </a>
				
					<a class="btn btn-default" href="{{ url('/properties/map') }}"><i class="glyphicon glyphicon-map-marker"></i> Map</a>
				

				</div>
			</div>

		</div>

		<div id="filters" class="collapse">
			<hr>
			<div class="row">
				
				<div class="col-xs-12 col-sm-4">
					  	<div class="form-group">
					    	<div class="input-group">
					      		<div class="input-group-addon">Built Year</div>
					      			<input type="range" class="form-control" id="builtYear" min="2000" max="{{date('Y')}}" value="2016" onchange="built_year.value=value">
					      		<output id="built_year" class="input-group-addon">2016</output>
					    	</div>
					  	</div>
				</div>

				<div class="col-xs-12 col-sm-4">
					  	<div class="form-group">
					    	<div class="input-group">
					      		<div class="input-group-addon">Plot Area</div>
					      			<input type="range" class="form-control" id="plotArea" min="500" max="5000" value="2000" onchange="plot_area.value=value">
					      		<output id="plot_area" class="input-group-addon">2000</output>
					    	</div>
					  	</div>
				</div>

				<div class="col-xs-12 col-sm-4">
					  	<div class="form-group">
					    	<div class="input-group">
					      		<div class="input-group-addon">Bed(s)</div>
					      			<input type="range" class="form-control" id="builtYear" min="1" max="20" value="2" onchange="beds.value=value">
					      		<output id="beds" class="input-group-addon">2</output>
					    	</div>
					  	</div>
				</div>

			</div>
		</div>

	</div>
</div>
