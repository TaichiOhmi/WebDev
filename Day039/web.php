<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
// use Gloudemans\Shoppingcart\Facades\Cart;

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




Route::get('/', [ItemController::class,'index'])->name('index');
Route::get('/show-items', [ItemController::class,'show'])->name('show');
Route::post('/store', [ItemController::class,'store'])->name('store');
Route::get('/{id}/edit', [ItemController::class,'edit'])->name('edit');
Route::patch('/{id}/update', [ItemController::class,'update'])->name('update');
Route::delete('/{id}/destroy', [ItemController::class,'destroy'])->name('destroy');

Route::get('/create-user', [UserController::class,'create'])->name('createUser');
Route::post('/store-user', [UserController::class,'store'])->name('storeUser');
Route::get('/show-users', [UserController::class,'show'])->name('users');
Route::get('/{id}/edit-user', [UserController::class,'edit'])->name('editUser');
Route::patch('/{id}/update-user', [UserController::class,'update'])->name('updateUser');
Route::delete('/{id}/destroy-user', [UserController::class,'destroy'])->name('destroyUser');

Auth::routes();
Route::group(['middleware'=>'auth'],function(){

    Route::get('/cart', [CartController::class,'index'])->name('cart.index');
    Route::post('/add-cart', [CartController::class,'store'])->name('cart.store');
    Route::patch('/update-cart', [CartController::class,'update'])->name('cart.update');
    Route::delete('/remove-from-cart', [CartController::class,'destroy'])->name('cart.destroy');
    Route::post('/checkout', [CartController::class,'checkout'])->name('cart.checkout');


    // Route::get('{user_id}/cart', [CartController::class,'show'])->name('cart');
    // Route::post('{user_id}/{item_id}/cart', [CartController::class,'add'])->name('add');
});