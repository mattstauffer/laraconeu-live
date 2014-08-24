@extends('layout')

@section('content')

<h1>Delete Message</h1>

<p>Are you sure you want to delete this message?</p>

<div class="message">
    <div class="date">{{ $message->published_at->format('H:i:s') }}</div>
    <div class="text">{{ $message->message }}</div>
    <div class="clear"></div>
</div>

{{ Form::open(['route' => ['message.destroy', $message->id], 'method' => 'DELETE']) }}
    {{ Form::submit('Delete Message', ['class' => 'button button-style2']) }}
    <a class="button button-style1" href="{{ route('admin') }}">Cancel</a>
{{ Form::close() }}

@stop