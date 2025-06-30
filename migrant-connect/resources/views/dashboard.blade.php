<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between animate-fade-in-up">
            <div>
                <h2 class="font-bold text-3xl text-gray-900 dark:text-gray-100 mb-2">
                    Welcome back, <span class="text-gradient">{{ Auth::user()->name }}</span>! 👋
                </h2>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Here's what's happening in your community today.</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <p class="text-sm text-gray-500 dark:text-gray-400">Today is</p>
                    <p class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ now()->format('l, F j, Y') }}</p>
                </div>
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg animate-pulse-slow">
                    <i class="fas fa-calendar-day text-white text-2xl"></i>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Total Events -->
            <div class="stat-card stat-card-hover animate-fade-in-up" style="animation-delay: 0.1s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Total Events</p>
                        <p class="text-4xl font-bold text-gradient mb-2">24</p>
                        <p class="text-sm text-green-600 dark:text-green-400 flex items-center">
                            <i class="fas fa-arrow-up mr-1"></i>
                            +12% from last month
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-calendar-alt text-white text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Active Forums -->
            <div class="stat-card stat-card-hover animate-fade-in-up" style="animation-delay: 0.2s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Active Forums</p>
                        <p class="text-4xl font-bold text-gradient-secondary mb-2">8</p>
                        <p class="text-sm text-blue-600 dark:text-blue-400 flex items-center">
                            <i class="fas fa-plus mr-1"></i>
                            +3 new this week
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-comments text-white text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Community Members -->
            <div class="stat-card stat-card-hover animate-fade-in-up" style="animation-delay: 0.3s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Members</p>
                        <p class="text-4xl font-bold text-gradient mb-2">1,247</p>
                        <p class="text-sm text-purple-600 dark:text-purple-400 flex items-center">
                            <i class="fas fa-users mr-1"></i>
                            +89 this month
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-users text-white text-2xl"></i>
                    </div>
                </div>
            </div>

            <!-- Recent Posts -->
            <div class="stat-card stat-card-hover animate-fade-in-up" style="animation-delay: 0.4s;">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 mb-1">Recent Posts</p>
                        <p class="text-4xl font-bold text-gradient-secondary mb-2">156</p>
                        <p class="text-sm text-orange-600 dark:text-orange-400 flex items-center">
                            <i class="fas fa-fire mr-1"></i>
                            +23 today
                        </p>
                    </div>
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-file-alt text-white text-2xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Upcoming Events -->
            <div class="lg:col-span-2">
                <div class="card card-hover animate-fade-in-up" style="animation-delay: 0.5s;">
                    <div class="px-6 py-4 border-b border-gray-200/50 dark:border-gray-700/50">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                                <i class="fas fa-calendar-week text-blue-600 mr-3"></i>
                                Upcoming Events
                            </h3>
                            <a href="{{ route('events.index') }}" class="text-sm text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 font-medium flex items-center group">
                                View all
                                <i class="fas fa-arrow-right ml-1 group-hover:translate-x-1 transition-transform"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Event Item -->
                            <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-2xl hover:shadow-medium transition-all duration-200 group">
                                <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-200">
                                    <i class="fas fa-calendar-day text-white text-xl"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 truncate">Community Meetup</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                        <i class="fas fa-clock mr-2"></i>
                                        Tomorrow at 2:00 PM
                                    </p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">
                                        <i class="fas fa-tag mr-1"></i>
                                        Free
                                    </span>
                                    <i class="fas fa-chevron-right text-gray-400 group-hover:text-blue-600 transition-colors"></i>
                                </div>
                            </div>

                            <!-- Event Item -->
                            <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-2xl hover:shadow-medium transition-all duration-200 group">
                                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-200">
                                    <i class="fas fa-language text-white text-xl"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 truncate">Language Exchange Workshop</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                        <i class="fas fa-clock mr-2"></i>
                                        Dec 15 at 6:00 PM
                                    </p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                                        <i class="fas fa-dollar-sign mr-1"></i>
                                        $10
                                    </span>
                                    <i class="fas fa-chevron-right text-gray-400 group-hover:text-green-600 transition-colors"></i>
                                </div>
                            </div>

                            <!-- Event Item -->
                            <div class="flex items-center space-x-4 p-4 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-2xl hover:shadow-medium transition-all duration-200 group">
                                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-lg group-hover:scale-110 transition-transform duration-200">
                                    <i class="fas fa-theater-masks text-white text-xl"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-lg font-semibold text-gray-900 dark:text-gray-100 truncate">Cultural Festival</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center">
                                        <i class="fas fa-clock mr-2"></i>
                                        Dec 20 at 4:00 PM
                                    </p>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                        <i class="fas fa-dollar-sign mr-1"></i>
                                        $25
                                    </span>
                                    <i class="fas fa-chevron-right text-gray-400 group-hover:text-purple-600 transition-colors"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Activity -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="card card-hover animate-fade-in-up" style="animation-delay: 0.6s;">
                    <div class="px-6 py-4 border-b border-gray-200/50 dark:border-gray-700/50">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                            <i class="fas fa-bolt text-yellow-600 mr-3"></i>
                            Quick Actions
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-3">
                            <a href="{{ route('events.create') }}" class="flex items-center space-x-3 p-4 rounded-2xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 dark:hover:from-blue-900/20 dark:hover:to-indigo-900/20 transition-all duration-200 group">
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200 shadow-lg">
                                    <i class="fas fa-plus text-white text-lg"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">Create Event</span>
                            </a>

                            <a href="{{ route('forums.create') }}" class="flex items-center space-x-3 p-4 rounded-2xl hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 dark:hover:from-green-900/20 dark:hover:to-emerald-900/20 transition-all duration-200 group">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200 shadow-lg">
                                    <i class="fas fa-comment-dots text-white text-lg"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">Start Discussion</span>
                            </a>

                            <a href="{{ route('profile.edit') }}" class="flex items-center space-x-3 p-4 rounded-2xl hover:bg-gradient-to-r hover:from-purple-50 hover:to-pink-50 dark:hover:from-purple-900/20 dark:hover:to-pink-900/20 transition-all duration-200 group">
                                <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-200 shadow-lg">
                                    <i class="fas fa-user-edit text-white text-lg"></i>
                                </div>
                                <span class="text-sm font-semibold text-gray-900 dark:text-gray-100">Edit Profile</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card card-hover animate-fade-in-up" style="animation-delay: 0.7s;">
                    <div class="px-6 py-4 border-b border-gray-200/50 dark:border-gray-700/50">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center">
                            <i class="fas fa-chart-line text-green-600 mr-3"></i>
                            Recent Activity
                        </h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-calendar-plus text-white text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">New event created</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">2 hours ago</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-comment text-white text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">New forum post</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">4 hours ago</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-user-plus text-white text-xs"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900 dark:text-gray-100">New member joined</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">6 hours ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
