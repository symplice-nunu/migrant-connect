@extends('layouts.app')

@section('header')
        <div class="relative overflow-hidden">
            <div class="relative flex flex-wrap items-center justify-between py-8 animate-fade-in-up">
                <div class="flex flex-wrap">
                    <div class="flex flex-wrap items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-slow">
                            <i class="fas fa-home text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="font-bold text-4xl text-gray-900 dark:text-gray-100 mb-1">
                                Welcome back, <span class="text-gradient bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">{{ Auth::user()->name }}</span>! 👋
                            </h2>
                            <p class="text-gray-600 dark:text-gray-400 text-lg">Here's what's happening in your vibrant community today.</p>
                        </div>
                    </div>
                    
                    <!-- Quick stats row -->
                    <div class="flex flex-wrap items-center space-x-6 mt-6">
                        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                            <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                            <span>Community is active</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                            <i class="fas fa-clock text-blue-500"></i>
                            <span>{{ now()->format('g:i A') }}</span>
                        </div>
                        <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                            <i class="fas fa-calendar-day text-purple-500"></i>
                            <span>{{ now()->format('l, F j') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-8">
        <!-- Enhanced Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Events -->
            <div class="group relative overflow-hidden bg-gradient-to-br from-blue-500 to-indigo-600 rounded-3xl p-6 text-white shadow-strong hover:shadow-glow transition-all duration-500 animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <i class="fas fa-calendar-alt text-white text-xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <h3 class="text-sm font-medium text-blue-100 mb-2">Total Events</h3>
                    <p class="text-4xl font-bold mb-2">24</p>
                    <div class="flex items-center text-blue-100 text-sm">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span>+12% from last month</span>
                    </div>
                </div>
            </div>

            <!-- Active Forums -->
            <div class="group relative overflow-hidden bg-gradient-to-br from-green-500 to-emerald-600 rounded-3xl p-6 text-white shadow-strong hover:shadow-glow transition-all duration-500 animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <i class="fas fa-comments text-white text-xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="w-3 h-3 bg-blue-400 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <h3 class="text-sm font-medium text-green-100 mb-2">Active Forums</h3>
                    <p class="text-4xl font-bold mb-2">8</p>
                    <div class="flex items-center text-green-100 text-sm">
                        <i class="fas fa-plus mr-1"></i>
                        <span>+3 new this week</span>
                    </div>
                </div>
            </div>

            <!-- Community Members -->
            <div class="group relative overflow-hidden bg-gradient-to-br from-purple-500 to-pink-600 rounded-3xl p-6 text-white shadow-strong hover:shadow-glow transition-all duration-500 animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="w-3 h-3 bg-yellow-400 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <h3 class="text-sm font-medium text-purple-100 mb-2">Members</h3>
                    <p class="text-4xl font-bold mb-2">1,247</p>
                    <div class="flex items-center text-purple-100 text-sm">
                        <i class="fas fa-users mr-1"></i>
                        <span>+89 this month</span>
                    </div>
                </div>
            </div>

            <!-- Recent Posts -->
            <div class="group relative overflow-hidden bg-gradient-to-br from-orange-500 to-red-600 rounded-3xl p-6 text-white shadow-strong hover:shadow-glow transition-all duration-500 animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-16 translate-x-16 group-hover:scale-150 transition-transform duration-500"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center backdrop-blur-sm">
                            <i class="fas fa-file-alt text-white text-xl"></i>
                        </div>
                        <div class="text-right">
                            <div class="w-3 h-3 bg-red-400 rounded-full animate-pulse"></div>
                        </div>
                    </div>
                    <h3 class="text-sm font-medium text-orange-100 mb-2">Recent Posts</h3>
                    <p class="text-4xl font-bold mb-2">156</p>
                    <div class="flex items-center text-orange-100 text-sm">
                        <i class="fas fa-fire mr-1"></i>
                        <span>+23 today</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Upcoming Events -->
            <div class="lg:col-span-2">
                <div class="card card-hover animate-fade-in-up" style="animation-delay: 0.5s;">
                    <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-gray-50 to-blue-50 dark:from-gray-800 dark:to-blue-900/20">
                        <div class="flex flex-wrap gap-4 items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                                    <i class="fas fa-calendar-week text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Upcoming Events</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">Don't miss out on these exciting community events</p>
                                </div>
                            </div>
                            <a href="{{ route('events.index') }}" class="group flex items-center space-x-2 px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl hover:from-blue-600 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-105">
                                <span class="text-sm font-semibold">View all</span>
                                <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <!-- Event Item 1 -->
                            <div class="group flex flex-wrap relative overflow-hidden bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-3xl p-6 hover:shadow-strong transition-all duration-300 border border-blue-200/50 dark:border-blue-700/50">
                                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-blue-400/20 to-indigo-400/20 rounded-full -translate-y-12 translate-x-12 group-hover:scale-150 transition-transform duration-500"></div>
                                <div class="relative flex flex-wrap items-center space-x-6">
                                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-200">
                                        <i class="fas fa-calendar-day text-white text-xl"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">Community Meetup</h4>
                                        <p class="text-gray-600 dark:text-gray-400 mb-3">Join us for an evening of networking, sharing stories, and building connections with fellow community members.</p>
                                        <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-clock text-blue-500"></i>
                                                <span>Tomorrow at 2:00 PM</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-map-marker-alt text-green-500"></i>
                                                <span>Community Center</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-end space-y-3">
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                            <i class="fas fa-tag mr-2"></i>
                                            Free
                                        </span>
                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                                            <i class="fas fa-chevron-right text-white text-sm"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Event Item 2 -->
                            <div class="group relative overflow-hidden bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-3xl p-6 hover:shadow-strong transition-all duration-300 border border-green-200/50 dark:border-green-700/50">
                                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-green-400/20 to-emerald-400/20 rounded-full -translate-y-12 translate-x-12 group-hover:scale-150 transition-transform duration-500"></div>
                                <div class="relative flex items-center space-x-6">
                                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-200">
                                        <i class="fas fa-language text-white text-xl"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">Language Exchange Workshop</h4>
                                        <p class="text-gray-600 dark:text-gray-400 mb-3">Practice different languages, share cultural insights, and make new friends in this interactive workshop.</p>
                                        <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-clock text-green-500"></i>
                                                <span>Dec 15 at 6:00 PM</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-map-marker-alt text-purple-500"></i>
                                                <span>Library Hall</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-end space-y-3">
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                            <i class="fas fa-dollar-sign mr-2"></i>
                                            $10
                                        </span>
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                                            <i class="fas fa-chevron-right text-white text-sm"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Event Item 3 -->
                            <div class="group relative overflow-hidden bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-3xl p-6 hover:shadow-strong transition-all duration-300 border border-purple-200/50 dark:border-purple-700/50">
                                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-br from-purple-400/20 to-pink-400/20 rounded-full -translate-y-12 translate-x-12 group-hover:scale-150 transition-transform duration-500"></div>
                                <div class="relative flex items-center space-x-6">
                                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-200">
                                        <i class="fas fa-theater-masks text-white text-xl"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-2">Cultural Festival</h4>
                                        <p class="text-gray-600 dark:text-gray-400 mb-3">Celebrate diversity with music, dance, food, and cultural performances from around the world.</p>
                                        <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-clock text-purple-500"></i>
                                                <span>Dec 20 at 4:00 PM</span>
                                            </div>
                                            <div class="flex items-center space-x-1">
                                                <i class="fas fa-map-marker-alt text-orange-500"></i>
                                                <span>City Park</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-col items-end space-y-3">
                                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                            <i class="fas fa-dollar-sign mr-2"></i>
                                            $25
                                        </span>
                                        <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200">
                                            <i class="fas fa-chevron-right text-white text-sm"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Activity -->
            <div class="space-y-8">
                <!-- Quick Actions -->
                <div class="card card-hover animate-fade-in-up" style="animation-delay: 0.6s;">
                    <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-gray-50 to-yellow-50 dark:from-gray-800 dark:to-yellow-900/20">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-bolt text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Quick Actions</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Get things done quickly</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <a href="{{ route('events.create') }}" class="group flex items-center space-x-4 p-4 rounded-2xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 dark:hover:from-blue-900/20 dark:hover:to-indigo-900/20 transition-all duration-300 border border-transparent hover:border-blue-200 dark:hover:border-blue-700">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200 shadow-lg">
                                    <i class="fas fa-plus text-white text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">Create Event</span>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Organize a new community event</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                            </a>

                            <a href="{{ route('forums.create') }}" class="group flex items-center space-x-4 p-4 rounded-2xl hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 dark:hover:from-green-900/20 dark:hover:to-emerald-900/20 transition-all duration-300 border border-transparent hover:border-green-200 dark:hover:border-green-700">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200 shadow-lg">
                                    <i class="fas fa-comment-dots text-white text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">Start Discussion</span>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Create a new forum topic</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-600 transition-colors"></i>
                            </a>

                            <a href="{{ route('profile.edit') }}" class="group flex items-center space-x-4 p-4 rounded-2xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 dark:hover:from-purple-900/20 dark:hover:to-pink-900/20 transition-all duration-300 border border-transparent hover:border-purple-200 dark:hover:border-purple-700">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200 shadow-lg">
                                    <i class="fas fa-user-edit text-white text-lg"></i>
                                </div>
                                <div class="flex-1">
                                    <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">Edit Profile</span>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">Update your information</p>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400 group-hover:text-purple-600 transition-colors"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card card-hover animate-fade-in-up" style="animation-delay: 0.7s;">
                    <div class="px-8 py-6 border-b border-gray-200/50 dark:border-gray-700/50 bg-gradient-to-r from-gray-50 to-green-50 dark:from-gray-800 dark:to-green-900/20">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                                <i class="fas fa-chart-line text-white text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">Recent Activity</h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Latest community updates</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4 group">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-200">
                                    <i class="fas fa-calendar-plus text-white text-sm"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1">New event created</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">"Winter Cultural Festival" was added to the calendar</p>
                                    <div class="flex items-center space-x-2 text-xs text-gray-400">
                                        <i class="fas fa-clock"></i>
                                        <span>2 hours ago</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 group">
                                <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-200">
                                    <i class="fas fa-comment text-white text-sm"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1">New forum post</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">"Language Learning Tips" discussion started</p>
                                    <div class="flex items-center space-x-2 text-xs text-gray-400">
                                        <i class="fas fa-clock"></i>
                                        <span>4 hours ago</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-4 group">
                                <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-200">
                                    <i class="fas fa-user-plus text-white text-sm"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 mb-1">New member joined</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400 mb-2">Sarah Johnson joined the community</p>
                                    <div class="flex items-center space-x-2 text-xs text-gray-400">
                                        <i class="fas fa-clock"></i>
                                        <span>6 hours ago</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
