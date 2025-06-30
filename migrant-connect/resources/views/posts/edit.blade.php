@extends('layouts.app')
@section('content')
    <div class="max-w-2xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('posts.show', $post->id) }}" 
               class="text-blue-600 hover:text-blue-800">
                ← Back to Post
            </a>
        </div>
        
        <h1 class="text-2xl font-bold mb-6">Edit Post</h1>
        
        <form method="POST" action="{{ route('posts.update', $post->id) }}" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="6" required
                          class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                          placeholder="Write your post content here...">{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end space-x-3">
                <a href="{{ route('posts.show', $post->id) }}" 
                   class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    Cancel
                </a>
                <button type="submit" 
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Update Post
                </button>
            </div>
        </form>
    </div>
@endsection 