@extends('layout')

@section('content')

<h1>Create Message</h1>

{{ Form::open(['route' => 'message.store', 'files' => true]) }}
    {{ Form::textarea('message', null, ['class' => 'form-textarea', 'placeholder' => 'Message']) }}
    {{ Form::file('picture', ['class' => 'form-file']) }}
    {{ Form::submit('Save Message', ['class' => 'button button-style2']) }}
    <a class="button button-style1" href="{{ route('admin') }}">Back</a>
{{ Form::close() }}

@stop