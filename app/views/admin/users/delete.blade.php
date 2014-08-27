@extends('layout')

@section('content')

<h1>Delete User</h1>

<p>Are you sure you want to delete this user?</p>

{{ Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) }}
    {{ Form::submit('Delete User', ['class' => 'button button-style2']) }}
    <a class="button button-style1" href="{{ route('users') }}">Cancel</a>
{{ Form::close() }}

@stop