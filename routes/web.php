<?php
use App\Http\Controllers\postController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'posts'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

// todo list
Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::post('/tasks/{id}/update', [TaskController::class, 'update'])->name('tasks.update');
Route::get('/tasks/{id}/delete', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::put('/tasks/finish/{id}', [TaskController::class, 'finish'])->name('tasks.finish');

