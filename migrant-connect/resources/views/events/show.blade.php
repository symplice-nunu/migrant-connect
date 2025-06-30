@extends('layouts.app')
@section('content')
    <h1>{{ $event->title }}</h1>
    <p>{{ $event->description }}</p>
    <p><strong>Location:</strong> {{ $event->location }}</p>
    <p><strong>Date:</strong> {{ $event->date }} <strong>Time:</strong> {{ $event->time }}</p>
    <h3>Participants ({{ $event->participants->count() }})</h3>
    <ul>
        @foreach ($event->participants as $participant)
            <li>User #{{ $participant->user_id }}</li>
        @endforeach
    </ul>
    @if ($isParticipant)
        <form method="POST" action="{{ route('events.leave', $event->id) }}">
            @csrf
            <button type="submit">Leave Event</button>
        </form>
    @else
        <form method="POST" action="{{ route('events.join', $event->id) }}">
            @csrf
            <button type="submit">Join Event</button>
        </form>
    @endif
    @if ($event->creator_id == auth()->id())
        <a href="{{ route('events.edit', $event->id) }}">Edit Event</a>
        <form method="POST" action="{{ route('events.destroy', $event->id) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Event</button>
        </form>
    @endif
@endsection 