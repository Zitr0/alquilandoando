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
    return view('welcome');
});

Route::post('/save', 'PagesController@save');

/*
Route::get('/', 'PagesController@index'); // localhost:8000/
Route::get('/{id}', 'PagesController@index');
Route::post('/save', 'PagesController@save');
Route::get('/deleteUser/{id}', 'PagesController@deleteUser');
*/

