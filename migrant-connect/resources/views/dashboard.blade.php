@extends('layouts.app')

@section('header')
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div class="flex items-center space-x-4">
            <div class="w-10 h-10 bg-teal-600 rounded-xl flex items-center justify-center">
                <i class="fas fa-home text-white"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 ">
                    Welcome back, {{ Auth::user()->name }}
                </h2>
                <p class="text-sm text-gray-500 ">Here's what's happening in your community today.</p>
            </div>
        </div>
        <div class="flex items-center space-x-4 text-sm text-gray-500 ">
            <div class="flex items-center space-x-1.5">
                <div class="w-2 h-2 bg-teal-500 rounded-full"></div>
                <span>Community active</span>
            </div>
            <span class="text-gray-300 ">|</span>
            <span>{{ now()->format('l, F j') }}</span>
        </div>
    </div>
@endsection

@section('content')
    <div class=" mx-auto pb-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <div class="bg-white rounded-2xl p-5 border border-gray-200  shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 bg-teal-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-calendar-alt text-teal-600 "></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900 ">{{ $totalEvents }}</p>
                <p class="text-sm text-gray-500 mt-1">Total Events</p>
            </div>

            <div class="bg-white rounded-2xl p-5 border border-gray-200  shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 bg-teal-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-comments text-teal-600 "></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900 ">{{ $totalForums }}</p>
                <p class="text-sm text-gray-500 mt-1">Active Forums</p>
            </div>

            <div class="bg-white rounded-2xl p-5 border border-gray-200  shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 bg-teal-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-teal-600 "></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900 ">{{ $totalMembers }}</p>
                <p class="text-sm text-gray-500 mt-1">Members</p>
            </div>

            <div class="bg-white rounded-2xl p-5 border border-gray-200  shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center justify-between mb-4">
                    <div class="w-10 h-10 bg-teal-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-file-alt text-teal-600 "></i>
                    </div>
                </div>
                <p class="text-3xl font-bold text-gray-900 ">{{ $totalPosts }}</p>
                <p class="text-sm text-gray-500 mt-1">Total Posts</p>
            </div>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Upcoming Events -->
            <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200  shadow-sm overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 ">
                    <div>
                        <h3 class="text-base font-semibold text-gray-900 ">Upcoming Events</h3>
                        <p class="text-xs text-gray-500 mt-0.5">Community events coming up</p>
                    </div>
                    <a href="{{ route('events.index') }}" class="flex items-center space-x-1.5 text-sm font-medium text-teal-600 hover:text-teal-700 :text-teal-300 transition-colors">
                        <span>View all</span>
                        <i class="fas fa-arrow-right text-xs"></i>
                    </a>
                </div>
                <div class="divide-y divide-gray-100 ">
                    @forelse($upcomingEvents as $event)
                    <a href="{{ route('events.show', $event->id) }}" class="flex items-center space-x-4 px-6 py-4 hover:bg-gray-50 transition-colors duration-150 block">
                        <div class="w-10 h-10 rounded-xl overflow-hidden flex-shrink-0">
                            @if($event->image)
                                <img src="{{ Storage::url($event->image) }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-teal-100 flex items-center justify-center">
                                    <i class="fas fa-calendar-day text-teal-600"></i>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 truncate">{{ $event->title }}</p>
                            <div class="flex items-center space-x-3 mt-0.5 text-xs text-gray-500">
                                <span><i class="fas fa-clock mr-1"></i>{{ \Carbon\Carbon::parse($event->date)->format('M j') }} at {{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}</span>
                                @if($event->location)
                                <span><i class="fas fa-map-marker-alt mr-1"></i>{{ $event->location }}</span>
                                @endif
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="px-6 py-8 text-center text-sm text-gray-400">
                        <i class="fas fa-calendar-times text-2xl mb-2 block"></i>
                        No upcoming events yet.
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Right column -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="bg-white rounded-2xl border border-gray-200  shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 ">
                        <h3 class="text-base font-semibold text-gray-900 ">Quick Actions</h3>
                    </div>
                    <div class="divide-y divide-gray-100 ">
                        <a href="{{ route('events.create') }}" class="flex items-center space-x-3 px-6 py-3.5 hover:bg-gray-50 :bg-gray-700/50 transition-colors duration-150 group">
                            <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center group-hover:bg-teal-600 transition-colors duration-150">
                                <i class="fas fa-plus text-teal-600 text-xs group-hover:text-white"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 ">Create Event</p>
                                <p class="text-xs text-gray-500 ">Organize a community event</p>
                            </div>
                            <i class="fas fa-chevron-right text-gray-300 text-xs group-hover:text-teal-500 transition-colors"></i>
                        </a>

                        <a href="{{ route('forums.create') }}" class="flex items-center space-x-3 px-6 py-3.5 hover:bg-gray-50 :bg-gray-700/50 transition-colors duration-150 group">
                            <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center group-hover:bg-teal-600 transition-colors duration-150">
                                <i class="fas fa-comment-dots text-teal-600 text-xs group-hover:text-white"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 ">Start Discussion</p>
                                <p class="text-xs text-gray-500 ">Create a forum topic</p>
                            </div>
                            <i class="fas fa-chevron-right text-gray-300 text-xs group-hover:text-teal-500 transition-colors"></i>
                        </a>

                        <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 px-6 py-3.5 hover:bg-gray-50 :bg-gray-700/50 transition-colors duration-150 group">
                            <div class="w-8 h-8 bg-teal-100 rounded-lg flex items-center justify-center group-hover:bg-teal-600 transition-colors duration-150">
                                <i class="fas fa-user-edit text-teal-600 text-xs group-hover:text-white"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-900 ">Edit Profile</p>
                                <p class="text-xs text-gray-500 ">Update your information</p>
                            </div>
                            <i class="fas fa-chevron-right text-gray-300 text-xs group-hover:text-teal-500 transition-colors"></i>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="bg-white rounded-2xl border border-gray-200  shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 ">
                        <h3 class="text-base font-semibold text-gray-900 ">Recent Activity</h3>
                    </div>
                    <div class="divide-y divide-gray-100">
                        @foreach($recentEvents as $event)
                        <div class="flex items-start space-x-3 px-6 py-4">
                            <div class="w-8 h-8 bg-teal-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-calendar-plus text-teal-600 text-xs"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900">New event created</p>
                                <p class="text-xs text-gray-500 mt-0.5 truncate">"{{ $event->title }}"</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $event->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach

                        @foreach($recentForums as $forum)
                        <div class="flex items-start space-x-3 px-6 py-4">
                            <div class="w-8 h-8 bg-teal-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-comment text-teal-600 text-xs"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900">New forum created</p>
                                <p class="text-xs text-gray-500 mt-0.5 truncate">"{{ $forum->title }}"</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $forum->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach

                        @foreach($recentMembers as $member)
                        <div class="flex items-start space-x-3 px-6 py-4">
                            <div class="w-8 h-8 bg-teal-100 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-user-plus text-teal-600 text-xs"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900">New member joined</p>
                                <p class="text-xs text-gray-500 mt-0.5">{{ $member->name }} joined the community</p>
                                <p class="text-xs text-gray-400 mt-1">{{ $member->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach

                        @if($recentEvents->isEmpty() && $recentForums->isEmpty() && $recentMembers->isEmpty())
                        <div class="px-6 py-8 text-center text-sm text-gray-400">No recent activity.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
