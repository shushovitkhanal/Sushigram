<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'feed'])->name('feed');

Route::get('/feed', [PostController::class, 'feed'])->middleware(['auth', 'verified'])->name('feed');

Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/comments/{postID}', [CommentController::class, 'index'])->name('comments.index');

Route::get('/user/{user_id}', [UserController::class, 'show'])->name('user.show');

Route::get('/post/{post_id}/edit', [PostController::class, 'edit'])->name('posts.edit');

Route::get('/comment/{comment_id}/edit', [CommentController::class, 'edit'])->name('comment.edit');

Route::post('/post/{post_id}/update', [PostController::class, 'update'])->name('posts.update');

Route::post('/comment/{comment_id}/update', [CommentController::class, 'update'])->name('comment.update');

Route::delete('/post/{post_id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');

Route::delete('/comment/{comment_id}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');


Route::get('/dashboard', [UserController::class, 'profile'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
