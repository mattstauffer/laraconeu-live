@extends('layout')

@section('content')

<h1>Delete Message</h1>

<p>Are you sure you want to delete this message?</p>

{{ View::make('_message', compact('message')) }}

{{ Form::open(['route' => ['message.destroy', $message->id], 'method' => 'DELETE']) }}
    {{ Form::submit('Delete Message', ['class' => 'button button-style2']) }}
    <a class="button button-style1" href="{{ route('admin') }}">Cancel</a>
{{ Form::close() }}

@stop