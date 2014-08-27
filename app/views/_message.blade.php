<div class="message">
    @if ($message->user)
    <div class="user">
        <img src="{{ $message->user->getGravatarUrl() }}" al="">
        <p>{{ $message->user->first_name }}</p>
    </div>
    @endif

    <div class="date"><span data-livestamp="{{ $message->published_at->getTimestamp() }}"></span></div>

    @if ($message->picture)
    <div class="picture">
        <a href="{{ asset('files/' . $message->picture) }}" target="_blank">
            <img src="{{ asset('files/' . $message->picture) }}" alt="" />
        </a>
    </div>
    @endif

    <div class="text">{{ $message->message }}</div>
</div>
