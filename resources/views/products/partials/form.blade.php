        

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
        
{{--         <div class="form-group">
            {!! Form::label('image_list','Images:') !!}
            {!! Form::select('image_list[]', $images, null, array('class' => 'form-control','multiple')) !!}
        </div> --}}
         

        {!! Form::submit( $submitButtonText, array('class' => 'btn btn-success') ) !!}
