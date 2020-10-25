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
    return view('guest.home');
});

Auth::routes(); //calcola in automatico tutte le routes che riguardano l'autenticazione



Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('posts', 'PostController');

});
//come alternativa a:
// Route::get('admin/home', 'Admin\HomeController@index')->name('home');
//il middleware in questo caso è una ripetizione, può essere tolto da qui o dal costruttore di HomeController, in questo caso l'ho tolto dal secondo.

//guest
Route::get('posts', 'PostController@index')->name('guest.posts.home');
Route::get('posts/show/{slug}', 'PostController@show')->name('guest.posts.show');