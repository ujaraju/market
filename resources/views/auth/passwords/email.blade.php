@extends('layouts.default')

@section('title', 'Forgot Password')


@section('page-title')
{{-- page-title go here --}}
@stop

@section('content')
{{-- contents go here --}}
    <div class="login m-x-auto p-y-3">
        <h3 class="m-b-2">Forgot Password</h3>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                
                
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
           
            </div>

            <div class="form-group text-right">
                
                    <button type="submit" class="btn btn-primary">
                        Send Password Reset Link
                    </button>
                
            </div>
        </form>

</div>    
@stop

@section('footer')
{{-- additional footer content go here eg: javascript --}}
@stop






