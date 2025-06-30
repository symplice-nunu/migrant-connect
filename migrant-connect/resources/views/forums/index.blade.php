@extends('layouts.app')
@section('content')
    <h1>Forums</h1>
    <a href="{{ route('forums.create') }}">Create Forum</a>
    <ul>
        @foreach ($forums as $forum)
            <li>
                <a href="{{ route('forums.show', $forum->id) }}">
                    {{ $forum->title }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection 