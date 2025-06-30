@extends('layouts.app')
@section('content')
    <h1>Conversation with User #{{ $userId }}</h1>
    <ul>
        @foreach ($messages as $message)
            <li>
                <strong>{{ $message->sender_id == auth()->id() ? 'You' : 'Them' }}:</strong>
                {{ $message->content }}
                <small>{{ $message->created_at }}</small>
            </li>
        @endforeach
    </ul>
    <form method="POST" action="{{ route('messages.store') }}">
        @csrf
        <input type="hidden" name="receiver_id" value="{{ $userId }}">
        <textarea name="content" required></textarea>
        <button type="submit">Send</button>
    </form>
@endsection 