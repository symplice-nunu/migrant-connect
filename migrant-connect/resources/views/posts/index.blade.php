@extends('layouts.app')
@section('content')
    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Posts</h1>
            <a href="{{ route('posts.create', ['forum_id' => $forum->id]) }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Create Post
            </a>
        </div>
        
        @if($posts->count() > 0)
            <div class="space-y-4">
                @foreach ($posts as $post)
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex justify-between items-start">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold mb-2">
                                    <a href="{{ route('posts.show', $post->id) }}" class="text-blue-600 hover:text-blue-800">
                                        {{ Str::limit($post->content, 100) }}
                                    </a>
                                </h3>
                                <p class="text-gray-600 text-sm">
                                    By User #{{ $post->user_id }} • {{ $post->created_at->diffForHumans() }}
                                </p>
                                @if($post->comments->count() > 0)
                                    <p class="text-gray-500 text-sm mt-1">
                                        {{ $post->comments->count() }} comment{{ $post->comments->count() !== 1 ? 's' : '' }}
                                    </p>
                                @endif
                            </div>
                            @if($post->user_id == auth()->id())
                                <div class="flex space-x-2">
                                    <a href="{{ route('posts.edit', $post->id) }}" 
                                       class="text-blue-600 hover:text-blue-800 text-sm">Edit</a>
                                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-800 text-sm"
                                                onclick="return confirm('Are you sure you want to delete this post?')">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-500 text-lg">No posts yet.</p>
                <p class="text-gray-400 mt-2">Be the first to create a post!</p>
            </div>
        @endif
        
        <div class="mt-6">
            <a href="{{ route('forums.show', $forum) }}" 
               class="text-blue-600 hover:text-blue-800">
                ← Back to Forum
            </a>
        </div>
    </div>
@endsection 