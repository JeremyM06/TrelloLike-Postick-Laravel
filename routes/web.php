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

//--- Redirection vers les boards
Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

//----Boards & Création de tables
Route::get('/table', 'TableController@index')->middleware('auth')->name('table');
Route::post('/table', 'TableController@store')->name('table.store');

//--- Table=>col/cards/com ---
Route::get('/details', 'TableController@edit')->middleware('auth')->name('table.edit');

Route::get('/col', 'ColumnController@index')->middleware('auth')->name('col.index');
Route::post('/col', 'ColumnController@store')->name('col.store');
//col





//--- Profile routes

// Route Profile GET && POST
Route::get('/profile', 'ProfilController@index')->middleware('auth')->name('profile.index');
Route::post('/profile', 'ProfilController@update')->name('profile.update');








// Route::prefix('/home', 'HomeController@index')->middleware('auth')->name('home')->group(function () {
//     Route::get('/table', 'TestController@index')->middleware('auth')->name('table');
//     Route::post('/table', 'TestController@store')->name('table.store');
//     Route::get('/col', 'ColumnController@index')->name('col.index');
//     Route::post('/col', 'ColumnController@store')->name('col.store');
// });
