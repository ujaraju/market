@extends('layouts.default')

@section('title', 'Register')


@section('page-title')
{{-- page-title go here --}}
@stop

@section('content')
{{-- contents go here --}}
    <div class="login m-x-auto p-y-3">
        <h3 class="m-b-2">Register</h3>

        <form class="" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                

                
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                

                
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                

                
                    <input type="password" class="form-control" name="password" placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                

                
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                
            </div>

            <div class="form-group text-right">
               
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>

            </div>

        </form>

    </div>
               
@stop

@section('footer')
{{-- additional footer content go here eg: javascript --}}
@stop

