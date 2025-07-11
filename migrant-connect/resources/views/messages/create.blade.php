@extends('layouts.app')

@section('content')
<div class="h-screen flex flex-col bg-gray-100">
    <!-- Header -->
    <div class="bg-green-500 px-4 py-3">
        <div class="flex items-center space-x-3">
            <a href="{{ route('messages.index') }}" 
               class="text-white hover:text-green-100">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-xl font-bold text-white">New Chat</h1>
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
                   id="user-search"
                   placeholder="Search users..." 
                   class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-gray-50 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-green-500 focus:border-green-500">
        </div>
    </div>

    <!-- User List -->
    <div class="flex-1 overflow-y-auto">
        <form method="POST" action="{{ route('messages.store') }}" class="space-y-4 p-4">
            @csrf
            
            <!-- User Selection -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-4 py-3 border-b border-gray-200">
                    <label for="receiver_id" class="block text-sm font-medium text-gray-700">
                        Select a user to start chatting:
                    </label>
                </div>
                <div class="p-4">
                    <select name="receiver_id" id="receiver_id" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">Choose a user...</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('receiver_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                    @error('receiver_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Message Content -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="px-4 py-3 border-b border-gray-200">
                    <label for="content" class="block text-sm font-medium text-gray-700">
                        Your message:
                    </label>
                </div>
                <div class="p-4">
                    <textarea 
                        name="content" 
                        id="content"
                        required 
                        placeholder="Type your message here..."
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent resize-none"
                        rows="4"
                    >{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-3">
                <a href="{{ route('messages.index') }}" 
                   class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-lg font-medium transition-colors">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-6 py-2 bg-green-500 hover:bg-green-600 text-white font-medium rounded-lg transition-colors">
                    Send Message
                </button>
            </div>
        </form>

        <!-- Quick Start Section -->
        @if($users->count() > 0)
            <div class="px-4 pb-4">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Start</h3>
                <div class="grid grid-cols-1 gap-3">
                    @foreach($users->take(8) as $user)
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4 hover:shadow-md transition-shadow">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold">
                                        {{ substr($user->name, 0, 1) }}
                                    </span>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $user->name }}
                                    </p>
                                    <p class="text-xs text-gray-500 truncate">
                                        {{ $user->email }}
                                    </p>
                                </div>
                                <button type="button" 
                                        onclick="selectUser({{ $user->id }}, '{{ $user->name }}')"
                                        class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-sm rounded-lg transition-colors">
                                    Message
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

<script>
function selectUser(userId, userName) {
    document.getElementById('receiver_id').value = userId;
    document.getElementById('content').focus();
}

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('user-search');
    const userOptions = document.querySelectorAll('option[value]');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            userOptions.forEach(option => {
                const userName = option.textContent.toLowerCase();
                if (userName.includes(searchTerm)) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
        });
    }
});
</script>
@endsection 