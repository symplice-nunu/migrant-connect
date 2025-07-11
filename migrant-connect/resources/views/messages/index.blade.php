@extends('layouts.app')

@section('content')
<div class="h-screen flex flex-col bg-gray-100">
    <!-- Header -->
    <div class="bg-green-500 px-4 py-3">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-bold text-white">Chats</h1>
            <div class="flex items-center space-x-3">
                <button class="p-2 text-white hover:bg-green-600 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
                <a href="{{ route('messages.create') }}" 
                   class="p-2 text-white hover:bg-green-600 rounded-full">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="bg-white px-4 py-3 border-b border-gray-200">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input type="text" 
                   placeholder="Search or start new chat" 
                   class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-gray-50 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500">
        </div>
    </div>

    <!-- Chat List -->
    <div class="flex-1 overflow-y-auto">
        @if(count($conversationDetails) > 0)
            @foreach($conversationDetails as $conversation)
                <a href="{{ route('messages.show', $conversation['user']->id) }}" 
                   class="block hover:bg-gray-50 transition-colors">
                    <div class="flex items-center px-4 py-3 border-b border-gray-100">
                        <!-- Avatar -->
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                <span class="text-white font-semibold text-lg">
                                    {{ substr($conversation['user']->name, 0, 1) }}
                                </span>
                            </div>
                        </div>
                        
                        <!-- Chat Info -->
                        <div class="flex-1 min-w-0 ml-3">
                            <div class="flex items-center justify-between">
                                <h3 class="text-sm font-semibold text-gray-900 truncate">
                                    {{ $conversation['user']->name }}
                                </h3>
                                <span class="text-xs text-gray-500">
                                    {{ $conversation['lastMessage']->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between mt-1">
                                <p class="text-sm text-gray-600 truncate flex-1">
                                    @if($conversation['lastMessage']->sender_id == auth()->id())
                                        <span class="text-gray-500">You: </span>
                                    @endif
                                    {{ Str::limit($conversation['lastMessage']->content, 50) }}
                                </p>
                                @if($conversation['unreadCount'] > 0)
                                    <div class="flex-shrink-0 ml-2">
                                        <span class="bg-green-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                            {{ $conversation['unreadCount'] > 99 ? '99+' : $conversation['unreadCount'] }}
                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div class="text-center py-12">
                <div class="text-gray-400 mb-4">
                    <svg class="mx-auto h-16 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No conversations yet</h3>
                <p class="text-gray-500 mb-6">Start a conversation by sending a message to someone.</p>
                <a href="{{ route('messages.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Start a Conversation
                </a>
            </div>
        @endif
    </div>
</div>

<script>
// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.querySelector('input[placeholder="Search or start new chat"]');
    const chatItems = document.querySelectorAll('a[href*="messages.show"]');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            chatItems.forEach(item => {
                const userName = item.querySelector('h3').textContent.toLowerCase();
                if (userName.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
});
</script>
@endsection 