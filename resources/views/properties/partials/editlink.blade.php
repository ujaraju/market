                @unless ( Auth::guest() )
                    @if ( $property->user_id == Auth::user()->id )
                        <a href="{{ action ('PropertiesController@edit', [$property->id]) }}">
                            <small>EDIT</small>
                        </a>
                    @endif
                @endunless