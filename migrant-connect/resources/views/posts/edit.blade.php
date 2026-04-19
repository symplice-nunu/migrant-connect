@extends('layouts.app')
@section('content')
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit Post</h1>
                <p class="text-gray-600 text-lg">Update your post and keep the conversation flowing</p>
            </div>
            
            <!-- Back Link -->
            <div class="mb-6">
                <a href="{{ route('posts.show', $post->id) }}" 
                   class="inline-flex items-center text-teal-600 hover:text-teal-800 font-medium transition-colors duration-200">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Post
                </a>
            </div>
            
            <!-- Form Card -->
            <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
                <!-- Card Header -->
                <div class="bg-gradient-to-r from-orange-600 to-red-600 px-6 py-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-white">Edit Post</h3>
                            <p class="text-orange-100 text-sm">Refine your message and improve clarity</p>
                        </div>
                    </div>
                </div>
                
                <!-- Form Content -->
                <div class="p-8">
                    <form method="POST" action="{{ route('posts.update', $post->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <!-- Content Field -->
                        <div class="space-y-2">
                            <label for="content" class="block text-sm font-semibold text-gray-700">
                                <span class="flex items-center">
                                    <svg class="h-4 w-4 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    Post Content
                                </span>
                            </label>
                            <div class="relative">
                                <textarea 
                                    name="content" 
                                    id="content" 
                                    rows="8" 
                                    
                                    class="block w-full px-4 py-3 border-2 border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-orange-500 focus:border-orange-500 transition-all duration-200 resize-none"
                                    placeholder="Update your post content here...">{{ old('content', $post->content) }}</textarea>
                                <div class="absolute bottom-3 right-3 text-xs text-gray-400">
                                    <span id="char-count">0</span> characters
                                </div>
                            </div>
                            @error('content')
                                <div class="flex items-center mt-2 text-sm text-red-600">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-6 border-t border-gray-100">
                            <a href="{{ route('posts.show', $post->id) }}" 
                               class="inline-flex items-center justify-center px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="bg-teal-600 flex items-center justify-center hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">
                                <svg class="w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Tips Section -->
            <div class="mt-8 bg-orange-50 rounded-xl p-6 border border-orange-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h4 class="text-sm font-semibold text-orange-900">Editing Tips</h4>
                        <div class="mt-2 text-sm text-orange-700">
                            <ul class="space-y-1">
                                <li>• Review your content for clarity and accuracy</li>
                                <li>• Consider how your changes affect the discussion</li>
                                <li>• Maintain the original intent of your message</li>
                                <li>• Update formatting if needed for better readability</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Character counter functionality
        const textarea = document.getElementById('content');
        const charCount = document.getElementById('char-count');
        
        // Initialize character count
        charCount.textContent = textarea.value.length;
        
        textarea.addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });
    </script>
@endsection 