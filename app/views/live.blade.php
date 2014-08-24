@extends('layout')

@section('content')

@if (count($messages))
    <h2>{{ date('F j, Y') }}</h2>
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