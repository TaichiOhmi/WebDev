<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/post/create',[PostController::class, 'create'])->name('post.create');
    Route::post('/post/store',[PostController::class, 'store'])->name('post.store');
    Route::get('/post/{id}/show', [PostController::class, 'show'])->name('post.show');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/post/{id}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');

    // comment
    Route::post('post/{post_id}/comment/store',[CommentController::class, 'store'])->name('comment.store');
    Route::delete('post/{comment_id}/comment/destroy',[CommentController::class, 'destroy'])->name('comment.destroy');

    // profile
    Route::get('/profile/{id}/show',[ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // like
    Route::post('/like/{post_id}/create',[LikeController::class, 'create'])->name('like.create');
    Route::post('/like/{post_id}/destroy',[LikeController::class, 'destroy'])->name('like.destroy');
});
