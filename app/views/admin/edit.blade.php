@extends('layout')

@section('content')

<h1>Edit Message</h1>

{{ Form::open(['route' => ['message.update', $message->id], 'method' => 'PUT', 'files' => true]) }}
    @if ($message->picture)
    <label class="remove-picture-checkbox">
        {{ Form::checkbox('delete_picture') }} Remove picture?
    </label>
    @else
    {{ Form::file('picture', ['class' => 'form-file']) }}
    @endif

    {{ Form::text('published_at', Input::old('published_at', $message->published_at->format('Y-m-d H:i')), ['class' => 'form-text', 'placeholder' => 'Published At', 'data-field' => 'datetime', 'readonly']) }}
    {{ Form::textarea('message', Input::old('message', $message->message), ['class' => 'form-textarea', 'placeholder' => 'Message']) }}

    {{ Form::submit('Save Message', ['class' => 'button button-style2']) }}
    <a class="button button-style2" href="{{ route('message.delete', $message->id) }}">Delete Message</a>
    <a class="button button-style1" href="{{ route('admin') }}">Back</a>
{{ Form::close() }}

<div id="dtBox"></div>

<h3>Preview Message</h3>

{{ View::make('_message', compact('message')) }}

@stop