@extends('layout')

@section('content')

<h1>Edit User</h1>

{{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PUT']) }}
    {{ Form::text('first_name', null, ['class' => 'form-text', 'placeholder' => 'First Name *']) }}
    <?php echo $errors->first('first_name', '<p>:message</p>'); ?>

    {{ Form::text('last_name', null, ['class' => 'form-text', 'placeholder' => 'Last Name *']) }}
    <?php echo $errors->first('last_name', '<p>:message</p>'); ?>

    {{ Form::email('email', null, ['class' => 'form-text', 'placeholder' => 'Email *']) }}
    <?php echo $errors->first('email', '<p>:message</p>'); ?>

    {{ Form::text('username', null, ['class' => 'form-text', 'placeholder' => 'Username *']) }}
    <?php echo $errors->first('username', '<p>:message</p>'); ?>

    {{ Form::password('password', ['class' => 'form-text', 'placeholder' => 'Change Password (optional)']) }}
    <?php echo $errors->first('password', '<p>:message</p>'); ?>

    {{ Form::submit('Save User', ['class' => 'button button-style2']) }}
    <a class="button button-style2" href="{{ route('user.delete', $user->id) }}">Delete User</a>
    <a class="button button-style1" href="{{ route('users') }}">Back</a>
{{ Form::close() }}

@stop