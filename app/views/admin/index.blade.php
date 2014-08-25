@extends('layout')

@section('content')

<h1>Messages</h1>

<a class="button button-style1" href="{{ route('message.create') }}">Create Message</a>

@if (count($messages))
<table class="messages-overview">
    <thead>
        <tr>
            <th>Published At</th>
            <th>Message</th>
            <th>Picture</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr>
            <td>{{ $message->published_at->format('d/m/Y H:i:s') }}</td>
            <td>{{ Str::words(strip_tags($message->message), 15) }}</td>
            <td>
                @if ($message->picture)
                <a href="{{ asset('files/' . $message->picture) }}" target="_blank">View</a>
                @endif
            </td>
            <td>
                <a href="{{ route('message.edit', $message->id) }}">edit</a> |
                <a href="{{ route('message.delete', $message->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No messages yet.</p>
@endif

@stop