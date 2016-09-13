@extends('layouts.dashboard')

@section('title', 'Edit:'.$user->title )

@section('hero')
{{-- hero go here --}}
@stop
@section('content')
{{-- contents go here --}}

<h3>Edit Profile: {{ $user->name }} </h3>

<div class="m-y-2"> 
{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id), 'enctype'=>"multipart/form-data")) }}

    <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">    
        {{ Form::label('password', 'Password:') }}
        {{ Form::input('password','password', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('phone', 'Phone:') }}
        {{ Form::text('phone', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('avatar', 'Avatar:') }}
        {{ Form:: file('avatar', null, array('class' => 'form-control')) }}
    </div>


    <div class="form-group text-right">
        <a class="btn btn-link" href="{{ url('/dashboard') }}">Cancel</a>
        {{ Form::submit('Update', array('class' => 'btn btn-primary')) }}
        {{-- {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn btn-primary')) }} --}}
    </div>

{{ Form::close() }}
</div>
@stop


@section('footer')
{{-- additional footer content go here eg: javascript --}}

@stop





