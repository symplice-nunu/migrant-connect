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

    <!-- Search and Filter Bar -->
    <div class="bg-white px-4 py-3 border-b border-gray-200">
        <div class="flex space-x-3">
            <!-- Search Input -->
            <div class="flex-1 relative">
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
            
            <!-- Location Filter -->
            <div class="w-48">
                <form method="GET" action="{{ route('messages.create') }}" id="location-filter-form">
                    <select name="location" id="location-filter" 
                            class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-green-500 focus:border-green-500"
                            onchange="this.form.submit()">
                        <option value="">All Locations ({{ $totalUsers }} users)</option>
                        @foreach($locations as $location)
                            <option value="{{ $location }}" {{ request('location') == $location ? 'selected' : '' }}>
                                {{ $location }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
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
                                {{ $user->name }} - {{ $user->email }}{{ $user->location ? ' • ' . $user->location : ' • No location' }}
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
                <h3 class="text-lg font-medium text-gray-900 mb-4">
                    Quick Start
                    @if(request('location'))
                        <span class="text-sm font-normal text-gray-500">({{ request('location') }} - {{ $users->count() }} users)</span>
                    @else
                        <span class="text-sm font-normal text-gray-500">(All users - {{ $users->count() }} users)</span>
                    @endif
                </h3>
                
                @if(!request('location') && $users->count() > 0)
                    <!-- Location Summary -->
                    <div class="mb-4 p-3 bg-gray-50 rounded-lg">
                        <p class="text-sm text-gray-600 mb-2">Users by location:</p>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $locationCounts = $users->groupBy('location')->map->count();
                            @endphp
                            @foreach($locationCounts as $location => $count)
                                <span class="text-xs bg-white px-2 py-1 rounded border">
                                    {{ $location ?? 'No location' }}: {{ $count }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
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
                                    <div class="flex items-center space-x-1 mt-1">
                                        @if($user->location)
                                            <span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                </svg>
                                                {{ $user->location }}
                                            </span>
                                        @else
                                            <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                </svg>
                                                No location
                                            </span>
                                        @endif
                                    </div>
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
        @else
            <div class="px-4 pb-4">
                @if(request('location'))
                    <!-- Show empty state for specific location -->
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No users found</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            No users found in <span class="font-medium text-green-600">{{ request('location') }}</span>. Try selecting a different location or clear the filter.
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('messages.create') }}" 
                               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200">
                                Clear Filter
                            </a>
                        </div>
                    </div>
                @else
                    <!-- Show available users when no users found in main list -->
                    @php
                        $availableUsers = App\Models\User::where('id', '!=', auth()->id())->orderBy('name')->get();
                    @endphp
                    @if($availableUsers->count() > 0)
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Available Users</h3>
                            <div class="grid grid-cols-1 gap-3">
                                @foreach($availableUsers as $user)
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
                                                <div class="flex items-center space-x-1 mt-1">
                                                    @if($user->location)
                                                        <span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full flex items-center">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                                                            </svg>
                                                            {{ $user->location }}
                                                        </span>
                                                    @else
                                                        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-full flex items-center">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                                                            </svg>
                                                            No location
                                                        </span>
                                                    @endif
                                                </div>
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
                    @else
                        <!-- Show empty state when truly no users available -->
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No users found</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                No users available to message. This might be because you're the only user in the system.
                            </p>
                        </div>
                    @endif
                @endif
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
    const quickStartCards = document.querySelectorAll('.bg-white.rounded-lg.shadow-sm');
    
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            
            // Filter dropdown options
            userOptions.forEach(option => {
                const userName = option.textContent.toLowerCase();
                if (userName.includes(searchTerm)) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
            
            // Filter quick start cards
            quickStartCards.forEach(card => {
                const userName = card.querySelector('.text-gray-900').textContent.toLowerCase();
                const userEmail = card.querySelector('.text-gray-500').textContent.toLowerCase();
                const userLocation = card.querySelector('.text-green-600')?.textContent.toLowerCase() || '';
                
                if (userName.includes(searchTerm) || userEmail.includes(searchTerm) || userLocation.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }
});
</script>
@endsection 