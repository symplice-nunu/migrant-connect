@extends('layouts.app')
@section('content')
    <h1>Your Conversations</h1>
    <ul>
        @foreach ($conversations as $userId => $messages)
            <li>
                <a href="{{ route('messages.show', $userId) }}">
                    Conversation with User #{{ $userId }} ({{ $messages->count() }} messages)
                </a>
            </li>
        @endforeach
    </ul>
@endsection 