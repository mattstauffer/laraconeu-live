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