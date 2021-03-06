<?php

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

Route::get('/', function () {
    return view('guest.home_guest');
});

Auth::routes();

Route::middleware('auth') 
    ->namespace('Admin') 
    ->name('admin.')
    ->prefix('admin') 
    ->group(function () { 
        Route::get('/', 'HomeController@index')->name('home_admin');
        Route::resource('/posts', 'PostController');
        Route::resource('/categories', 'CategoryController');
        Route::resource('/tags', 'TagController');
        // questa andrà tolta perchè per ragioni di sicurezza, lo gestisce già laravel da solo
        Route::resource('/users', 'UserController');
    });

Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::get("{any?}", function() {
    return view('guest.home_guest');
})->where("any", ".*");
