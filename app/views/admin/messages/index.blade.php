@extends('layout')

@section('content')

<h1>Messages</h1>

<div class="button-grouped">
    <a class="button button-style2" href="{{ route('message.create') }}">Create Message</a>
    <a class="button button-style1" href="{{ route('users') }}">Users</a>
</div>

@if (count($messages))
<table class="table">
    <thead>
        <tr>
            <th width="160">Published At</th>
            <th>Message</th>
            <th width="90">User</th>
            <th width="100">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $message)
        <tr>
            <td>{{ $message->published_at->format('d/m/Y H:i:s') }}</td>
            <td>{{ Str::words(strip_tags($message->message), 15) }}</td>
            <td>{{ $message->user->first_name }}</td>
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