@extends('layout')

@section('content')

<p class="timezone-notice">Timezone is CET</p>

<h1>{{ date('F j, Y') }}</h1>

@if (count($messages))
    @foreach($messages as $message)
    <div class="message">
        <div class="date">{{ $message->published_at->format('H:i') }}</div>
        <div class="text">{{ $message->message }}</div>
        <div class="clear"></div>
    </div>
    @endforeach
@else
<p>No messages yet.</p>
@endif

@stop