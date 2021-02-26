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
Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'UserController@index')->middleware('auth');
Route::post('users', 'UserController@store')->name('users.store')->middleware('auth');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')->middleware('auth');

// Route::resource('users', 'UserController')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
