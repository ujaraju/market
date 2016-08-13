
        <div class="col-sm-4">
            <div class="thumbnail">
              

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
    

