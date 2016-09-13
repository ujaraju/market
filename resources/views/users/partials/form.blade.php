

<h1>Edit User</h1>

{{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}

    <div class="form-group">
        {{ Form::label('username', 'Username:') }}
        {{ Form::text('username') }}
    </div>
    <div class="form-group">    
        {{ Form::label('password', 'Password:') }}
        {{ Form::text('password') }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email:') }}
        {{ Form::text('email') }}
    </div>
    <div class="form-group">
        {{ Form::label('phone', 'Phone:') }}
        {{ Form:: text('phone') }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Name:') }}
        {{ Form::text('name') }}
    </div>
    <div class="form-group">
        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        {{ link_to_route('users.show', 'Cancel', $user->id, array('class' => 'btn')) }}
    </div>

{{ Form::close() }}
