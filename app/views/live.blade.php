@extends('layout')

@section('content')

<h1>{{ date('F j, Y') }}</h1>

@if (count($messages))
    @foreach($messages as $message)
    <div class="message">
        <div class="date">{{ $message->created_at->format('H:i:s') }}</div>
        <div class="text">{{ $message->message }}</div>
        <div class="clear"></div>
    </div>
    @endforeach
@else
<p>No messages yet.</p>
@endif

@stop