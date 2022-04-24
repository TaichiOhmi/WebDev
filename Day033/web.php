<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TodoController::class,'index'])->name('index');// name('') Named routes allow the convenient generation of URLs or redirects for specific routes. 
Route::post('/store', [TodoController::class,'store'])->name('store');
Route::get('/{id}/edit', [TodoController::class,'edit'])->name('edit');
Route::patch('/{id}/update', [TodoController::class,'update'])->name('update');
Route::get('/{id}/destroy', [TodoController::class,'destroy'])->name('destroy');