<?php

use App\Http\Controllers\AdminPostsController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function () {
    return view('admin.index');
});

//assigning a route(s) to its middleware for security 
Route::middleware(['admin'])->group(function(){
    
    Route::resource('admin/users' , 'App\Http\Controllers\AdminUsersController');
    //or like this,, newer way
    Route::resource('admin/posts' , AdminPostsController::class);


});

