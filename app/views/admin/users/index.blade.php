@extends('layout')

@section('content')

<h1>Users</h1>

<div class="button-grouped">
    <a class="button button-style2" href="{{ route('user.create') }}">Create User</a>
    <a class="button button-style1" href="{{ route('admin') }}">Messages</a>
</div>

@if (count($users))
<table class="table">
    <thead>
        <tr>
            <th width="50"></th>
            <th>Name</th>
            <th width="100">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td><img src="{{ $user->getGravatarUrl(50) }}" al=""></td>
            <td>{{ $user->fullname() }}</td>
            <td>
                <a href="{{ route('user.edit', $user->id) }}">edit</a> |
                <a href="{{ route('user.delete', $user->id) }}">delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@stop