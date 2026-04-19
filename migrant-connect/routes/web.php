<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Event;
use App\Models\Forum;
use App\Models\Post;
use App\Models\User;

Route::get('/', function () {
    $totalMembers = User::count();
    $totalEvents  = Event::count();
    $totalForums  = Forum::count();
    $totalPosts   = Post::count();
    return view('welcome', compact('totalMembers', 'totalEvents', 'totalForums', 'totalPosts'));
});

Route::get('/dashboard', function () {
    $totalEvents   = Event::count();
    $totalForums   = Forum::count();
    $totalMembers  = User::count();
    $totalPosts    = Post::count();

    $upcomingEvents = Event::where('date', '>=', now()->toDateString())
        ->orderBy('date')
        ->orderBy('time')
        ->take(3)
        ->get();

    $recentEvents = Event::orderBy('created_at', 'desc')->take(3)->get();
    $recentForums = Forum::orderBy('created_at', 'desc')->take(3)->get();
    $recentMembers = User::orderBy('created_at', 'desc')->take(3)->get();

    return view('dashboard', compact(
        'totalEvents', 'totalForums', 'totalMembers', 'totalPosts',
        'upcomingEvents', 'recentEvents', 'recentForums', 'recentMembers'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

// Debug route to test profile
Route::get('/debug-profile', function () {
    if (auth()->check()) {
        return view('profile.edit', ['user' => auth()->user()]);
    } else {
        return 'Not authenticated';
    }
})->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('messages', App\Http\Controllers\MessageController::class);
    Route::get('messages/search/users', [App\Http\Controllers\MessageController::class, 'searchUsers'])->name('messages.search-users');
    Route::get('messages/{userId}/new', [App\Http\Controllers\MessageController::class, 'getNewMessages'])->name('messages.new');
    Route::post('messages/{userId}/read', [App\Http\Controllers\MessageController::class, 'markAsRead'])->name('messages.read');
    Route::resource('events', App\Http\Controllers\EventController::class);
    Route::resource('forums', App\Http\Controllers\ForumController::class);
    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('comments', App\Http\Controllers\CommentController::class);

    Route::post('events/{event}/join', [App\Http\Controllers\EventController::class, 'join'])->name('events.join');
    Route::post('events/{event}/leave', [App\Http\Controllers\EventController::class, 'leave'])->name('events.leave');
});

require __DIR__.'/auth.php';
