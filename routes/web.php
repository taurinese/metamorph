<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/posts/{post}/like', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like');
Route::post('/photos/{photo}/like', [App\Http\Controllers\PhotoController::class, 'like'])->name('photos.like');
Route::post('/photos/{photo}/comment', [App\Http\Controllers\PhotoController::class, 'comment'])->name('photos.comment');
Route::post('/posts/{post}/comment', [App\Http\Controllers\PostController::class, 'comment'])->name('posts.comment');
Route::post('/comments/{comment}/like', [App\Http\Controllers\CommentController::class, 'like'])->name('comments.like');
