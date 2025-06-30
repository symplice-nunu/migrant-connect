@extends('layouts.app')
@section('content')
    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('posts.index', ['forum_id' => $post->forum_id]) }}" 
               class="text-blue-600 hover:text-blue-800">
                ← Back to Posts
            </a>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <h1 class="text-2xl font-bold mb-2">Post</h1>
                    <p class="text-gray-600 text-sm">
                        By User #{{ $post->user_id }} • {{ $post->created_at->diffForHumans() }}
                    </p>
                </div>
                @if($post->user_id == auth()->id())
                    <div class="flex space-x-2">
                        <a href="{{ route('posts.edit', $post->id) }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                    onclick="return confirm('Are you sure you want to delete this post?')">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            
            <div class="prose max-w-none">
                <p class="text-gray-800 leading-relaxed">{{ $post->content }}</p>
            </div>
        </div>
        
        <!-- Comments Section -->
        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-bold mb-4">Comments ({{ $post->comments->count() }})</h2>
            
            @if($post->comments->count() > 0)
                <div class="space-y-4 mb-6">
                    @foreach ($post->comments as $comment)
                        <div class="border-l-4 border-gray-200 pl-4">
                            <p class="text-gray-800">{{ $comment->content }}</p>
                            <p class="text-gray-600 text-sm mt-1">
                                By User #{{ $comment->user_id }} • {{ $comment->created_at->diffForHumans() }}
                            </p>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500 mb-6">No comments yet.</p>
            @endif
            
            <!-- Add Comment Form -->
            <form method="POST" action="{{ route('comments.store') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                
                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700">Add a Comment</label>
                    <textarea name="content" id="content" rows="3" required
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                              placeholder="Write your comment...">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add Comment
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 