<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\Author;

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
});

Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->middleware(['auth','role:admin'])->name('admin.dashboard');
Route::get('/author/dashboard',[AuthorController::class,'dashboard'])->middleware(['auth','role:author'])->name('author.dashboard');

Route::get('admin/posts/management',[AdminController::class,'postManagement'])->middleware(['auth','role:admin'])->name('post.management');
Route::get('admin/posts/management/search',[PostController::class,'search'])->middleware(['auth','role:admin'])->name('post.managementSearch');

Route::get('/posts',[PostController::class,'index'])->name('posts');
Route::get('/post/{id}',[PostController::class,'show'])->name('show.post');
Route::delete('/post/delete/{id}',[PostController::class,'destroy'])->name('post.delete');
Route::get('/post/tag/{id}',[PostController::class,'searchByTag'])->name('show.tag');
Route::post('/post/comment/{id}',[PostController::class,'createComment'])->name('comment.create');

Route::get('/geloo',[AdminController::class,'test'])->name('test');





require __DIR__.'/auth.php';
