


        <div class="col-sm-6">
            <div class="card">

            {{-- {{$property}} --}}

                @unless ($property->images->isEmpty())
                    {{-- <ul class="list-unstyled slideshow">
                        @foreach( $property->images as $image)
                            <li><img src="{{ $image->path }}" class="img-responsive"></li>
                        @endforeach                         
                    </ul>  --}}  
                    <a href="{{ action ('PropertiesController@show', [$property->id]) }}"> 
                        <img src="{{$property->images->first()->url}}" class="img-responsive">
                    </a>        
                @endunless

                <a href="{{ action ('PropertiesController@show', [$property->id]) }}">
                    <h2>{{ $property->title }}</h2>
                </a>

                <span class="label label-success">{{ $property->price }}</span>
                <p>{{ $property->description }}</p>


                @unless ( Auth::guest() )
                    @if ( $property->user_id == Auth::user()->id )
                        <a href="{{ action ('PropertiesController@edit', [$property->id]) }}">
                            <small>EDIT</small>
                        </a>
                    @endif
                @endunless


            </div>
        </div>
    

