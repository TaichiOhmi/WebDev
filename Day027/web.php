<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\PostController;
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
//     return "hello world";
// });
// Route::get('/profile', function () {
//     return "THIS IS PROFILE PAGE";
// });
// Route::get('/profile/user', function () {
//     return "this is user-profile page";
// });
// // parameter
// Route::get('/user/{user_id}', function($user_id) {
//     return "this is user $user_id";
// });
// // multiple parameters
// Route::get('{username}/post/{post_id}', function($username, $post_id){
//     return "Post id: $post_id. This is the post of $username";
// });

// // naming route
// // Define the name of the route using the name method. 
// // Adding a name to a route makes it convenient to generate URLs or redirect to that route.
// Route::get('/dashboard/admin', function(){
//     return 'welcome admin';
// })->name('admin');
// Route::get('/dashboard/subscriber', function(){
//     return 'welcome user';
// })->name('sub');

// // Access a route by its name using the route method.
// Route::get('/login', function(){
//     return redirect()->route('sub'); // header("location: ~~.php);
//  });