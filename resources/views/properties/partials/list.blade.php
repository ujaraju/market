


        <div class="col-sm-6">
            <div class="card m-t-2">
            {{-- {{$property}} --}}
                @unless ($property->images->isEmpty())
                    <a href="{{ action ('PropertiesController@show', [$property->id]) }}"> 
                        
                        @if( !$property->images->first()->name )
                            <img src="{{$property->images->first()->url}}" class="img-responsive">
                        @else
                            <img src="{{url('/uploads/properties/medium').'/'.$property->images->first()->name }}" class="img-responsive">
                        @endif 

                    </a>        
                @endunless

                <div class="card-content p-a-1">                
                    <h4 class="m-t-0">
                        <a href="{{ action ('PropertiesController@show', [$property->id]) }}">
                        {{ $property->title }}
                        </a>
                    </h4>

                    <p class="m-b-0">Rs. {{ number_format ( $property->price ) }}</p>
                    {{$property->address}}

                    @unless ($property->categories->isEmpty())
                        @foreach( $property->categories as $category)
                            <a class="label label-success" href="#">{{$category->name}}</a>
                        @endforeach
                    @endunless


                    {{-- When user is logged in and in dashboard show edit delete buttons --}}
                    @unless ( Auth::guest() )
                        @if ( $property->user_id == Auth::user()->id && Request::is('dashboard') )
                            
                        <hr class="m-y-1">
                        <ul class="list-inline m-y-0 text-right">  
                            <li>
                                <a class="" href="{{ action ('PropertiesController@edit', [$property->id]) }}">Delete</a>
                            </li>
                            <li>
                                <a class="" href="{{ action ('PropertiesController@edit', [$property->id]) }}">Edit</a>
                            </li>
                        </ul>

                        @endif
                    @endunless
                    
                </div>


            </div>
        </div>
    

