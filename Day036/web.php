<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [PostController::class, 'index'])->name('index');

    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

    Route::group(['prefix'=>'post', 'as'=>'post.'], function(){
        Route::get('/create', [PostController::class,'create'])->name('create');
        Route::get('/store', [PostController::class,'store'])->name('store');
    });
});
