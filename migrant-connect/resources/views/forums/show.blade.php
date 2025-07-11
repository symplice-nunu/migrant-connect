@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Forum Header Section -->
    <div class="mb-8 animate-fade-in-up">
        <div class="glass rounded-2xl p-8 shadow-soft border border-gray-200/50 dark:border-gray-700/50">
            <div class="flex items-start justify-between mb-6">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-xl flex items-center justify-center shadow-glow-blue">
                            <i class="fas fa-comments text-white text-xl"></i>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">{{ $forum->title }}</h1>
                            <div class="flex items-center gap-4 text-sm text-gray-600 dark:text-gray-400">
                                <span class="flex items-center gap-1">
                                    <i class="fas fa-calendar-alt"></i>
                                    Created {{ $forum->created_at->diffForHumans() }}
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fas fa-comment"></i>
                                    {{ $forum->posts->count() }} posts
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="fas fa-users"></i>
                                    {{ $forum->posts->unique('user_id')->count() }} participants
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 dark:text-gray-300 text-lg leading-relaxed">{{ $forum->description }}</p>
                </div>
            </div>
            
            <!-- Action Buttons -->
            <div class="flex flex-wrap gap-4">
                <a href="{{ route('posts.create', ['forum_id' => $forum->id]) }}" 
                   class="btn-primary flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:scale-105">
                    <i class="fas fa-plus"></i>
                    Create New Post
                </a>
                
                @if ($forum->created_by == auth()->id())
                    <a href="{{ route('forums.edit', $forum->id) }}" 
                       class="btn-secondary flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:scale-105">
                        <i class="fas fa-edit"></i>
                        Edit Forum
                    </a>
                    <form method="POST" action="{{ route('forums.destroy', $forum->id) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white flex items-center gap-2 px-6 py-3 rounded-xl font-semibold transition-all duration-300 hover:scale-105 shadow-soft"
                                onclick="return confirm('Are you sure you want to delete this forum?')">
                            <i class="fas fa-trash"></i>
                            Delete Forum
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Posts Section -->
    <div class="mb-8 animate-fade-in-up" style="animation-delay: 0.2s;">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white flex items-center gap-3">
                <i class="fas fa-list-ul text-blue-500"></i>
                Forum Posts
            </h2>
            <div class="text-sm text-gray-600 dark:text-gray-400">
                Showing {{ $forum->posts->count() }} posts
            </div>
        </div>

        @if($forum->posts->count() > 0)
            <div class="grid gap-6">
                @foreach ($forum->posts as $post)
                    <div class="card card-hover post-card p-6 border border-gray-200/50 dark:border-gray-700/50 rounded-2xl shadow-soft animate-fade-in-up">
                        <div class="flex items-start gap-4">
                            <!-- User Avatar -->
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-blue-500 rounded-full flex items-center justify-center shadow-glow">
                                    <span class="text-white font-semibold text-lg">
                                        {{ strtoupper(substr($post->user->name ?? 'U', 0, 1)) }}
                                    </span>
                                </div>
                            </div>
                            
                            <!-- Post Content -->
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center gap-3 mb-3">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        <a href="{{ route('posts.show', $post->id) }}" 
                                           class="hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-200">
                                            {{ Str::limit($post->content, 60) }}
                                        </a>
                                    </h3>
                                    @if($post->created_at->diffInHours(now()) < 24)
                                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-green-900 dark:text-green-300 new-badge">
                                            New
                                        </span>
                                    @endif
                                </div>
                                
                                <p class="text-gray-600 dark:text-gray-400 mb-4 leading-relaxed">
                                    {{ Str::limit($post->content, 150) }}
                                </p>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-user"></i>
                                            {{ $post->user->name ?? 'Anonymous User' }}
                                        </span>
                                        <span class="flex items-center gap-1">
                                            <i class="fas fa-clock"></i>
                                            {{ $post->created_at->diffForHumans() }}
                                        </span>
                                        @if($post->comments_count > 0)
                                            <span class="flex items-center gap-1">
                                                <i class="fas fa-comments"></i>
                                                {{ $post->comments_count }} replies
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <a href="{{ route('posts.show', $post->id) }}" 
                                       class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300 font-medium text-sm flex items-center gap-1 transition-colors duration-200">
                                        Read More
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="text-center py-12 animate-fade-in-up">
                <div class="w-24 h-24 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fas fa-comment-slash text-3xl text-gray-400"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">No posts yet</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-6">Be the first to start a conversation in this forum!</p>
                <a href="{{ route('posts.create', ['forum_id' => $forum->id]) }}" 
                   class="btn-primary inline-flex items-center gap-2 px-6 py-3 rounded-xl font-semibold">
                    <i class="fas fa-plus"></i>
                    Create First Post
                </a>
            </div>
        @endif
    </div>

    <!-- Forum Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 animate-fade-in-up" style="animation-delay: 0.4s;">
        <div class="stat-card stat-card-hover p-6 rounded-2xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/50 rounded-xl flex items-center justify-center">
                    <i class="fas fa-comments text-blue-600 dark:text-blue-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Posts</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $forum->posts->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="stat-card stat-card-hover p-6 rounded-2xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/50 rounded-xl flex items-center justify-center">
                    <i class="fas fa-users text-green-600 dark:text-green-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Participants</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $forum->posts->unique('user_id')->count() }}</p>
                </div>
            </div>
        </div>
        
        <div class="stat-card stat-card-hover p-6 rounded-2xl">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/50 rounded-xl flex items-center justify-center">
                    <i class="fas fa-clock text-purple-600 dark:text-purple-400 text-xl"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Last Activity</p>
                    <p class="text-lg font-semibold text-gray-900 dark:text-white">
                        @php
                            $latestPost = $forum->posts->sortByDesc('created_at')->first();
                        @endphp
                        {{ $latestPost ? $latestPost->created_at->diffForHumans() : 'No activity' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Additional custom styles for this page */
    .forum-header {
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1) 0%, rgba(168, 85, 247, 0.1) 100%);
    }
    
    .post-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .post-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.1), transparent);
        transition: left 0.5s;
    }
    
    .post-card:hover::before {
        left: 100%;
    }
    
    .post-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }
    
    .user-avatar {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        transition: transform 0.3s ease;
    }
    
    .post-card:hover .user-avatar {
        transform: scale(1.1);
    }
    
    .new-badge {
        animation: pulse 2s infinite;
    }
    
    .stat-card {
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.05) 0%, rgba(168, 85, 247, 0.05) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    
    .stat-card:hover::before {
        opacity: 1;
    }
    
    .stat-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.1);
    }
    
    .btn-primary, .btn-secondary {
        position: relative;
        overflow: hidden;
    }
    
    .btn-primary::before, .btn-secondary::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }
    
    .btn-primary:hover::before, .btn-secondary:hover::before {
        left: 100%;
    }
    
    /* Staggered animation for posts */
    .post-card:nth-child(1) { animation-delay: 0.1s; }
    .post-card:nth-child(2) { animation-delay: 0.2s; }
    .post-card:nth-child(3) { animation-delay: 0.3s; }
    .post-card:nth-child(4) { animation-delay: 0.4s; }
    .post-card:nth-child(5) { animation-delay: 0.5s; }
    
    /* Enhanced glassmorphism */
    .glass {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .dark .glass {
        background: rgba(17, 24, 39, 0.8);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    /* Smooth scrolling for the page */
    html {
        scroll-behavior: smooth;
    }
    
    /* Custom scrollbar for the page */
    ::-webkit-scrollbar {
        width: 8px;
    }
    
    ::-webkit-scrollbar-track {
        background: rgba(0, 0, 0, 0.1);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 4px;
    }
    
    ::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(135deg, #5a67d8, #6b46c1);
    }
</style>
@endsection 