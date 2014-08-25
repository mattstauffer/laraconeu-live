@extends('layout')

@section('content')

<p class="timezone-notice">Timezone is CET</p>

<h1>{{ date('F j, Y') }}</h1>

@if (count($messages))
    @foreach($messages as $message)
    <div class="message">
        <div class="date">{{ $message->published_at->format('H:i') }}</div>

        @if ($message->picture)
        <div class="picture">
            <a href="{{ asset('files/' . $message->picture) }}" target="_blank">
                <img src="{{ asset('files/' . $message->picture) }}" alt="" />
            </a>
        </div>
        @endif

        <div class="text">{{ $message->message }}</div>
    </div>
    @endforeach
@else
<p>No messages yet.</p>
@endif

@stop