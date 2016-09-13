@extends('layouts.default')

@section('title', 'Login')


@section('page-title')
{{-- page-title go here --}}
@stop

@section('content')
{{-- contents go here --}}
    <div class="login m-x-auto p-y-3">
        <h3 class="m-b-2">Login</h3>
        <form class="form-vertical" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {{-- <label class="control-label">E-Mail Address</label> --}}
                
                <input type="email" class="form-control" name="email" placeholder="E-Mail Address" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {{-- <label class="control-label">Password</label> --}}

                
                    <input type="password" class="form-control" name="password" placeholder="Password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
             
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember"> Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-xs-5 text-right">    
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <a class="" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
            </div>
        </form>
    </div>
@stop


@section('footer')
{{-- additional footer content go here eg: javascript --}}
@stop





