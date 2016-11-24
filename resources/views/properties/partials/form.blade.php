
      
        <div class="wizard m-t-2 m-b-1">
            <div class="wizard-inner">
                <div class="connecting-line"></div>
                <ul class="nav nav-tabs" role="tablist">

                    <li role="presentation" class="active">
                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            Location
                        </a>
                    </li>

                    <li role="presentation">
                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            Details
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            Images
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab" title="Step 4">
                            Features
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            Additional Features
                        </a>
                    </li>

 
                    <li class="pull-right">
                        {!! Form::submit( $submitButtonText, array('class' => 'btn btn-primary') ) !!}
                    </li>
                  

                </ul>
            </div>


                <div class="tab-content p-t-2">
                    
                    <div class="tab-pane active" role="tabpanel" id="step1">

                        {{-- Location MAP --}}
                        <div class="form-group">
                            {!! Form::label('address','Address') !!}
                            {!! Form::text('address', null, array('id'=>'address','class' => 'form-control','placeholder'=>'')) !!}
                        </div>

                        <small class="text-danger">Move the marker below to pin point the location of the property</small>
                        <div id="map-canvas" class="form-group" style="height:250px;"></div> 

                        <div class="form-group form-inline">
                            {{-- {!! Form::label('lat','Lattitude') !!} --}}
                            {!! Form::hidden('lat', null, array('id'=>'lat','class' => 'form-control', 'readonly'=>'true')) !!}
                        
                            {{-- {!! Form::label('lng','Longitude') !!} --}}
                            {!! Form::hidden('lng', null, array('id'=>'lng','class' => 'form-control', 'readonly'=>'true')) !!}
                        </div>
                        {{-- Location MAP --}}
                        

                    </div>
                    {{-- Location tab --}}


                    <div class="tab-pane" role="tabpanel" id="step2">



                        <div class="form-group">
                            {!! Form::label('title','Title') !!}
                            {!! Form::text('title', null, array('class' => 'form-control')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description','Description') !!}
                            {!! Form::textarea('description', null, array('class' => 'form-control','rows'=>'4')) !!}
                        </div>

                        <div class="row">
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('category_list','For:') !!}
                                    {!! Form::select('category_list[]', $categories, null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('price','Price') !!}
                                    {!! Form::text('price', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('published_at','Publish on') !!}
                                    {!! Form::input('date', 'published_at', date('Y-m-d'), array('class' => 'form-control')) !!}
                                </div>
                            </div>

                        </div>


                    </div>
                    {{-- Property Info Tab --}}

                    <div class="tab-pane" role="tabpanel" id="step3">
                        
                        <div class="form-group">
                            {{ Form::file('images[]', array('class' => ' ','multiple'=>true)) }}
                        </div>


                    </div>


                    <div class="tab-pane" role="tabpanel" id="step4">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('built_year','Built Year') !!}
                                    {!! Form::text('built_year', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">    
                                <div class="form-group">
                                    {!! Form::label('plot_area','Plot Area in Square Meter') !!}
                                    {!! Form::text('plot_area', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">    
                                <div class="form-group">
                                    {!! Form::label('size_area','Building Size in Cubic Meter') !!}
                                    {!! Form::text('size_area', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                        
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('levels','Levels') !!}
                                    {!! Form::text('levels', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    {!! Form::label('bed','Number of bed rooms') !!}
                                    {!! Form::text('bed', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">    
                                <div class="form-group">
                                    {!! Form::label('bath','Number of bathrooms') !!}
                                    {!! Form::text('bath', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">    
                                <div class="form-group">
                                    {!! Form::label('kitchen','Number of kitchens') !!}
                                    {!! Form::text('kitchen', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">    
                                <div class="form-group">
                                    {!! Form::label('garage','Garage') !!}
                                    {!! Form::text('garage', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">    
                                <div class="form-group">
                                    {!! Form::label('floor','Floor type') !!}
                                    {!! Form::text('floor', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-sm-4">    
                                <div class="form-group">
                                    {!! Form::label('use','Use') !!}
                                    {!! Form::text('use', null, array('class' => 'form-control')) !!}
                                </div>
                            </div>    
                        </div>    
                        


                    </div>



                    <div class="tab-pane" role="tabpanel" id="complete">

                        <div class="form-group">
                            {!! Form::label('additional_features','Additional Features') !!}
                            <small class="text-muted m-l-1">Separate each feature with a comma</small>
                            {!! Form::textarea('additional_features', null, array('class' => 'form-control', 'rows'=>'3')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('utilities','Utilities') !!}
                            <small class="text-muted m-l-1">Separate each utility with a comma</small>
                            {!! Form::textarea('utilities', null, array('class' => 'form-control', 'rows'=>'3')) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('around_property','Around the property') !!}
                            <small class="text-muted m-l-1">Separate each attraction with a comma</small>
                            {!! Form::textarea('around_property', null, array('class' => 'form-control', 'rows'=>'3')) !!}
                        </div>


                    </div>
                    
                </div>
          
        </div>









        
        {{--         
        <div class="form-group">
            {!! Form::label('image_list','Images:') !!}
            {!! Form::select('image_list[]', $images, null, array('class' => 'form-control','multiple')) !!}
        </div> 
        --}}












