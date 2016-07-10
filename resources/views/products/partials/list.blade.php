
        <div class="col-sm-4">
            <div class="thumbnail">
                <a href="{{ action ('ProductsController@show', [$product->id]) }}">
                    <h2>{{ $product->title }}</h2>
                </a>

                <span class="label label-success">{{ $product->price }}</span>
                <p>{{ $product->description }}</p>


                @unless ( Auth::guest() )
                    @if ( $product->user_id == Auth::user()->id )
                        <a href="{{ action ('ProductsController@edit', [$product->id]) }}">
                            <small>EDIT</small>
                        </a>
                    @endif
                @endunless


            </div>
        </div>
    

