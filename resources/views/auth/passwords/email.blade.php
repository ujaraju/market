@extends('layouts.default')

@section('title', 'Reset Password')

@section('helper')
{{-- filter go here --}}
@stop

@section('hero')
{{-- hero go here --}}
@stop

@section('page-title')
{{-- page-title go here --}}
Reset Password
@stop

@section('content')
{{-- contents go here --}}

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">E-Mail Address</label>

            <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-btn fa-envelope"></i>Send Password Reset Link
                </button>
            </div>
        </div>
    </form>
@stop

@section('footer')
{{-- additional footer content go here eg: javascript --}}
@stop






