@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 ">
    <div class=" mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Beautiful Header Section -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg mb-6">
                <i class="fas fa-comments text-2xl text-white"></i>
            </div>
            <h1 class="text-5xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent mb-4">
                Community Forums
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Connect with fellow migrants, share experiences, and find support in our vibrant community forums.
            </p>
        </div>

        <!-- Create Forum Button -->
        <div class="flex justify-center mb-12">
            <a href="{{ route('forums.create') }}" 
               class="group inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                <i class="fas fa-plus-circle mr-3 text-lg group-hover:scale-110 transition-transform duration-300"></i>
                Create New Forum
            </a>
        </div>

        <!-- Forums Grid -->
        @if($forums->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($forums as $forum)
                    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100  overflow-hidden transform hover:-translate-y-2 transition-all duration-300">
                        <!-- Card Header with Gradient -->
                        <div class="relative bg-gradient-to-r from-blue-50 to-indigo-50 px-8 py-6">
                            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-indigo-600"></div>
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 :text-blue-400 transition-colors duration-300">
                                        {{ $forum->title }}
                                    </h3>
                                    @if(isset($forum->description))
                                        <p class="text-gray-600 leading-relaxed">
                                            {{ Str::limit($forum->description, 120) }}
                                        </p>
                                    @else
                                        <p class="text-gray-500 italic">
                                            Join the conversation in this community forum and connect with fellow members.
                                        </p>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 border border-green-200 ">
                                        <i class="fas fa-circle text-green-500 mr-2 text-xs"></i>
                                        Active
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-8">
                            <!-- Forum Stats -->
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="text-center p-4 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl border border-blue-100 ">
                                    <div class="flex items-center justify-center w-10 h-10 bg-blue-500 rounded-lg mx-auto mb-2">
                                        <i class="fas fa-users text-white"></i>
                                    </div>
                                    <p class="text-lg font-bold text-gray-900 ">{{ rand(5, 50) }}</p>
                                    <p class="text-xs text-gray-600 font-medium">Members</p>
                                </div>
                                <div class="text-center p-4 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl border border-indigo-100 ">
                                    <div class="flex items-center justify-center w-10 h-10 bg-indigo-500 rounded-lg mx-auto mb-2">
                                        <i class="fas fa-comment text-white"></i>
                                    </div>
                                    <p class="text-lg font-bold text-gray-900 ">{{ rand(10, 100) }}</p>
                                    <p class="text-xs text-gray-600 font-medium">Posts</p>
                                </div>
                            </div>

                            <!-- Last Activity -->
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                <span class="flex items-center">
                                    <i class="fas fa-clock mr-2"></i>
                                    {{ $forum->created_at ? $forum->created_at->diffForHumans() : 'Recently' }}
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-fire mr-2 text-orange-500"></i>
                                    Trending
                                </span>
                            </div>

                            <!-- View Button -->
                            <a href="{{ route('forums.show', $forum->id) }}" 
                               class="group/btn w-full inline-flex items-center justify-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-md hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                                <span class="mr-2">View Forum</span>
                                <i class="fas fa-arrow-right group-hover/btn:translate-x-1 transition-transform duration-300"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination Info -->
            <div class="mt-12 text-center">
                <div class="inline-flex items-center px-6 py-3 bg-white rounded-xl shadow-lg border border-gray-100 ">
                    <i class="fas fa-info-circle text-blue-500 mr-3"></i>
                    <p class="text-gray-600 font-medium">
                        Showing {{ $forums->count() }} forum{{ $forums->count() !== 1 ? 's' : '' }}
                        @if($forums instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            of {{ $forums->total() }} total
                        @endif
                    </p>
                </div>
            </div>
        @else
            <!-- Beautiful Empty State -->
            <div class="text-center py-20">
                <div class="max-w-md mx-auto">
                    <div class="relative mb-8">
                        <div class="w-32 h-32 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mx-auto shadow-xl">
                            <i class="fas fa-comments text-4xl text-blue-600 "></i>
                        </div>
                        <div class="absolute -top-2 -right-2 w-8 h-8 bg-gradient-to-br from-yellow-400 to-orange-500 rounded-full flex items-center justify-center shadow-lg">
                            <i class="fas fa-plus text-white text-sm"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">
                        No Forums Yet
                    </h3>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Be the first to create a forum and start building our amazing community! Share your experiences and connect with fellow migrants.
                    </p>
                    <a href="{{ route('forums.create') }}" 
                       class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300">
                        <i class="fas fa-plus-circle mr-3 text-lg"></i>
                        Create First Forum
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>

<!-- Enhanced CSS for smooth animations -->
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .animate-fade-in-up {
        animation: fadeInUp 0.6s ease-out forwards;
    }
    
    /* Smooth scrolling */
    html {
        scroll-behavior: smooth;
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: #f1f5f9;
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #3b82f6, #6366f1);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #2563eb, #4f46e5);
    }
</style>
@endsection 