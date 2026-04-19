@extends('layouts.app')
@section('content')
    <div class="max-w-4xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('posts.index', ['forum_id' => $post->forum_id]) }}" 
               class="text-teal-600 hover:text-teal-800">
                ← Back to Posts
            </a>
        </div>
        
        <div class="bg-white shadow rounded-lg p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <div class="flex items-start gap-3">
                    <div class="w-10 h-10 rounded-full overflow-hidden flex-shrink-0">
                        @if($post->user?->avatar)
                            <img src="{{ Storage::url($post->user->avatar) }}" alt="{{ $post->user->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-teal-600 flex items-center justify-center">
                                <span class="text-white font-semibold">{{ strtoupper(substr($post->user->name ?? 'U', 0, 1)) }}</span>
                            </div>
                        @endif
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold mb-1">Post</h1>
                        <p class="text-gray-600 text-sm">
                            By {{ $post->user->name ?? 'Anonymous' }} • {{ $post->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
                @if($post->user_id == auth()->id())
                    <div class="flex space-x-2">
                        <a href="{{ route('posts.edit', $post->id) }}" 
                           class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">
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
                        <div class="border-l-4 border-teal-400 pl-4">
                            <p class="text-gray-800">{{ $comment->content }}</p>
                            <div class="flex items-center gap-2 mt-2">
                                <div class="w-7 h-7 rounded-full overflow-hidden flex-shrink-0">
                                    @if($comment->user?->avatar)
                                        <img src="{{ Storage::url($comment->user->avatar) }}" alt="{{ $comment->user->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full bg-teal-600 flex items-center justify-center">
                                            <span class="text-white text-xs font-semibold">{{ strtoupper(substr($comment->user->name ?? 'U', 0, 1)) }}</span>
                                        </div>
                                    @endif
                                </div>
                                <p class="text-gray-600 text-sm">
                                    {{ $comment->user->name ?? 'Anonymous' }} • {{ $comment->created_at->diffForHumans() }}
                                </p>
                            </div>
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
                    <textarea name="content" id="content" rows="3" 
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-teal-500 focus:border-teal-500"
                              placeholder="Write your comment...">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="flex justify-end">
                    <button type="submit" 
                            class="bg-teal-600 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">
                        Add Comment
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection 