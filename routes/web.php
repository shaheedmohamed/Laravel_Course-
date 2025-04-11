<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;

Route::get('/posts', [PostController::class, 'posts']) ->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');