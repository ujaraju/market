        

        <div class="form-group">
            {!! Form::label('category_list','Categories:') !!}
            {!! Form::select('category_list[]', $categories, null, array('class' => 'form-control','multiple')) !!}
        </div>

        <div class="form-group">
        	{!! Form::label('title','Title') !!}
        	{!! Form::text('title', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
    		{!! Form::label('description','Description') !!}
        	{!! Form::textarea('description', null, array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
    		{!! Form::label('price','Price') !!}
        	{!! Form::text('price', null, array('class' => 'form-control')) !!}
        </div>


        <div class="form-group">
            {!! Form::label('published_at','Publish on') !!}
            {!! Form::input('date', 'published_at', date('Y-m-d'), array('class' => 'form-control')) !!}
        </div>

        <div class="form-group">
            {{ Form::file('images[]', array('class' => ' ','multiple'=>true)) }}
        </div>
        
        {{--         
        <div class="form-group">
            {!! Form::label('image_list','Images:') !!}
            {!! Form::select('image_list[]', $images, null, array('class' => 'form-control','multiple')) !!}
        </div> 
        --}}

        {{-- Location MAP --}}
        <div class="form-group">
            {!! Form::label('address','Address') !!}
            {!! Form::text('address', null, array('id'=>'address','class' => 'form-control','placeholder'=>'')) !!}
        </div>

        <small>Move the marker below to pin point the location of the property</small>
        <div id="map-canvas" class="form-group" style="width:500px; height:300px;"></div> 

        <div class="form-group form-inline">
            {!! Form::label('lat','Lattitude') !!}
            {!! Form::text('lat', null, array('id'=>'lat','class' => 'form-control', 'readonly'=>'true')) !!}
        
            {!! Form::label('lng','Longitude') !!}
            {!! Form::text('lng', null, array('id'=>'lng','class' => 'form-control', 'readonly'=>'true')) !!}
        </div>
        {{-- Location MAP --}}


        {!! Form::submit( $submitButtonText, array('class' => 'btn btn-success') ) !!}

