@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Event Header Section -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden mb-8">
        <!-- Event Hero Image -->
        <div class="h-48 bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 relative overflow-hidden">
            <div class="absolute inset-0 bg-black bg-opacity-20"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <div class="text-center text-white">
                    <i class="fas fa-calendar-alt text-6xl mb-4 opacity-80"></i>
                    <h1 class="text-4xl font-bold">{{ $event->title }}</h1>
                </div>
            </div>
            <div class="absolute top-4 right-4">
                <div class="bg-white bg-opacity-20 backdrop-blur-sm rounded-full px-4 py-2 text-white text-sm font-medium">
                    <i class="fas fa-users mr-2"></i>{{ $event->participants->count() }} Participants
                </div>
            </div>
        </div>

        <!-- Event Details -->
        <div class="p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Event Details</h2>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-blue-600 "></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 ">Location</h3>
                                    <p class="text-gray-600 ">{{ $event->location }}</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar text-green-600 "></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 ">Date</h3>
                                    <p class="text-gray-600 ">{{ \Carbon\Carbon::parse($event->date)->format('l, F j, Y') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-clock text-purple-600 "></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 ">Time</h3>
                                    <p class="text-gray-600 ">{{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-10 h-10 bg-orange-100 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-user text-orange-600 "></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-900 ">Organizer</h3>
                                    <p class="text-gray-600 ">{{ $event->creator->name ?? 'Unknown' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">Description</h2>
                        <div class="bg-gray-50 rounded-xl p-6">
                            <p class="text-gray-700 leading-relaxed">{{ $event->description }}</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="space-y-4">
                        @if ($isParticipant)
                            <form method="POST" action="{{ route('events.leave', $event->id) }}" class="w-full">
                                @csrf
                                <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Leave Event</span>
                                </button>
                            </form>
                        @else
                            <form method="POST" action="{{ route('events.join', $event->id) }}" class="w-full">
                                @csrf
                                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Join Event</span>
                                </button>
                            </form>
                        @endif

                        @if ($event->creator_id == auth()->id())
                            <div class="grid grid-cols-2 gap-4">
                                <a href="{{ route('events.edit', $event->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                                    <i class="fas fa-edit"></i>
                                    <span>Edit</span>
                                </a>
                                <form method="POST" action="{{ route('events.destroy', $event->id) }}" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')" class="w-full bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-xl transition-all duration-200 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                                        <i class="fas fa-trash"></i>
                                        <span>Delete</span>
                                    </button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Participants Section -->
    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
        <div class="p-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-gray-900 flex items-center">
                    <i class="fas fa-users mr-3 text-blue-500"></i>
                    Participants ({{ $event->participants->count() }})
                </h2>
                <div class="bg-blue-100 text-blue-800  px-4 py-2 rounded-full text-sm font-medium">
                    {{ $event->participants->count() }} {{ Str::plural('person', $event->participants->count()) }}
                </div>
            </div>

            @if($event->participants->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($event->participants as $participant)
                        <div class="bg-gray-50 rounded-xl p-4 hover:bg-gray-100 :bg-gray-600 transition-colors duration-200">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-semibold">
                                    {{ substr($participant->user->name ?? 'U', 0, 1) }}
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ $participant->user->name ?? 'Unknown User' }}
                                    </p>
                                    <p class="text-xs text-gray-500 truncate">
                                        {{ $participant->user->email ?? 'No email' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-gray-400 text-2xl"></i>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">No participants yet</h3>
                    <p class="text-gray-500 ">Be the first to join this event!</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Back to Events Link -->
    <div class="mt-8 text-center">
        <a href="{{ route('events.index') }}" class="inline-flex items-center space-x-2 text-blue-600 hover:text-blue-800 :text-blue-300 font-medium transition-colors duration-200">
            <i class="fas fa-arrow-left"></i>
            <span>Back to Events</span>
        </a>
    </div>
</div>
@endsection 