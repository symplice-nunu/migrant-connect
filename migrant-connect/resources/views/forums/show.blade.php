@extends('layouts.app')
@section('content')
    <h1>{{ $forum->title }}</h1>
    <p>{{ $forum->description }}</p>
    <a href="{{ route('posts.create', ['forum_id' => $forum->id]) }}">Create Post</a>
    <h3>Posts</h3>
    <ul>
        @foreach ($forum->posts as $post)
            <li>
                <a href="{{ route('posts.show', $post->id) }}">
                    {{ Str::limit($post->content, 50) }} by User #{{ $post->user_id }}
                </a>
            </li>
        @endforeach
    </ul>
    @if ($forum->created_by == auth()->id())
        <a href="{{ route('forums.edit', $forum->id) }}">Edit Forum</a>
        <form method="POST" action="{{ route('forums.destroy', $forum->id) }}" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit">Delete Forum</button>
        </form>
    @endif
@endsection 