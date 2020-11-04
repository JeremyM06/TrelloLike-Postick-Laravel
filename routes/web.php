<?php

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

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::get('/table', 'TestController@index')->name('table');

//--- Profile routes

// Route Profile GET
Route::get('/profile', 'UserController@index')->middleware('auth')->name('profile.index');

// Route Profile POST
Route::post('/profile', 'UserController@store')->name('profile.store');
