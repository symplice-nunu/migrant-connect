@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-8 animate-fade-in-up">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-2">
                    <span class="text-gradient">Events</span>
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-400">Discover and join amazing community events</p>
            </div>
            <a href="{{ route('events.create') }}" class="btn-primary inline-flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Create Event
            </a>
        </div>
    </div>

    <!-- Events Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($events as $event)
        <div class="card card-hover animate-fade-in-up" style="animation-delay: {{ $loop->index * 0.1 }}s;">
            <!-- Event Image Placeholder -->
            <div class="h-48 bg-gradient-to-br from-blue-500 to-indigo-600 relative overflow-hidden">
                <div class="absolute inset-0 flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-white/80 text-4xl"></i>
                </div>
                <!-- Event Date Badge -->
                <div class="absolute top-4 right-4 glass rounded-2xl px-4 py-2 shadow-lg">
                    <p class="text-sm font-bold text-gray-900 dark:text-gray-100">{{ \Carbon\Carbon::parse($event->date)->format('M j') }}</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($event->date)->format('Y') }}</p>
                </div>
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>

            <!-- Event Content -->
            <div class="p-6">
                <div class="flex items-start justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 line-clamp-2">{{ $event->title }}</h3>
                </div>

                @if($event->description)
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-6 line-clamp-3">{{ Str::limit($event->description, 120) }}</p>
                @endif

                <!-- Event Details -->
                <div class="space-y-3 mb-6">
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <i class="fas fa-clock text-blue-600 mr-3"></i>
                        {{ \Carbon\Carbon::parse($event->date)->format('g:i A') }}
                    </div>
                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                        <i class="fas fa-map-marker-alt text-green-600 mr-3"></i>
                        {{ $event->location ?? 'Location TBD' }}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between">
                    <a href="{{ route('events.show', $event->id) }}" class="btn-secondary inline-flex items-center">
                        View Details
                        <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    
                    <div class="flex items-center space-x-2">
                        @if($event->user_id === auth()->id())
                        <a href="{{ route('events.edit', $event->id) }}" class="inline-flex items-center p-3 text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 rounded-xl transition-all duration-200">
                            <i class="fas fa-edit"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @empty
        <!-- Empty State -->
        <div class="col-span-full">
            <div class="text-center py-16">
                <div class="w-32 h-32 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center mx-auto mb-8 shadow-lg animate-pulse-slow">
                    <i class="fas fa-calendar-plus text-white text-4xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">No events yet</h3>
                <p class="text-xl text-gray-600 dark:text-gray-400 mb-8 max-w-md mx-auto">Be the first to create an event and bring the community together!</p>
                <a href="{{ route('events.create') }}" class="btn-primary inline-flex items-center text-lg px-8 py-4">
                    <i class="fas fa-plus mr-3"></i>
                    Create Your First Event
                </a>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection 