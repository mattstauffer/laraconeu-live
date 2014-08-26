@extends('layout')

@section('content')

<h1 class="live-blog-date">{{ date('F j, Y') }}</h1>
<p class="timezone-notice">Timezone is CET</p>

<div id="live-blog">
    @if (count($messages))
        @foreach($messages as $message)
        {{ View::make('_message', compact('message')) }}
        @endforeach
    @else
    <div id="countdown-message">
        <p>Laracon EU starts on the 28th of August. We'll sporadically post updates on the 28th and will fully live-blog the main event on the 29th and 30th.</p>
        <p>Tune in here for live coverage during the event!</p>
        <p>The Laracon EU Staff</p>
    </div>
    @endif
</div>

@stop