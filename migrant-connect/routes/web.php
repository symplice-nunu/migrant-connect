<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('messages', App\Http\Controllers\MessageController::class);
    Route::resource('events', App\Http\Controllers\EventController::class);
    Route::resource('forums', App\Http\Controllers\ForumController::class);
    Route::resource('posts', App\Http\Controllers\PostController::class);
    Route::resource('comments', App\Http\Controllers\CommentController::class);

    Route::post('events/{event}/join', [App\Http\Controllers\EventController::class, 'join'])->name('events.join');
    Route::post('events/{event}/leave', [App\Http\Controllers\EventController::class, 'leave'])->name('events.leave');
});

require __DIR__.'/auth.php';
