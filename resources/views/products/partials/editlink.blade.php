                @unless ( Auth::guest() )
                    @if ( $product->user_id == Auth::user()->id )
                        <a href="{{ action ('ProductsController@edit', [$product->id]) }}">
                            <small>EDIT</small>
                        </a>
                    @endif
                @endunless