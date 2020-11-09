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
Route::post('/table', 'TableController@store')->middleware('auth')->name('table.store');
//Team boards
Route::get('/table/team', 'TableController@update')->middleware('auth')->name('table.update');
Route::get('/table/destroy', 'TableController@destroy')->middleware('auth')->name('table.destroy');


Route::get('/table/background', 'TableController@background')->middleware('auth')->name('table.image');




//--- Table=>col/cards/com ---
Route::get('/detailsTable', 'TableController@edit')->middleware('auth')->name('table.edit');
//Create col
Route::post('/col', 'ColumnController@store')->middleware('auth')->name('col.store');
//Change col
Route::any('/col/change', 'ColumnController@update')->middleware('auth')->name('col.update');
//Delete card
Route::get('/col/delete', 'ColumnController@destroy')->middleware('auth')->name('col.delete');


//Create card
Route::post('/card', 'CardController@store')->middleware('auth')->name('card.store');
//Create update
Route::any('/card/update', 'CardController@update')->middleware('auth')->name('card.update');
//Delete Card
Route::get('/card/delete', 'CardController@destroy')->middleware('auth')->name('card.delete');

//Create comments
Route::post('/com', 'CommentsController@store')->middleware('auth')->name('com.store');
//delete comments
Route::get('/com/delete', 'CommentsController@destroy')->middleware('auth')->name('com.delete');









//--- Profile routes

// Route Profile GET && POST
Route::get('/profile', 'ProfilController@index')->middleware('auth')->name('profile.index');
Route::post('/profile', 'ProfilController@update')->name('profile.update');


//  Home master (home personnalisée)

// Route show GET
Route::get('/homemaster', 'UserController@show')->name('homemaster.show.');

// Route create POST
Route::post('/homemaster', 'UserController@create')->name('homemaster.create');

// Route destroy
Route::get('/homemaster', 'UserController@destroy')->name('homemaster.destroy');

// Route update
Route::get('/homemaster', 'UserController@update')->name('homemaster.update');


// Route::prefix('/home', 'HomeController@index')->middleware('auth')->name('home')->group(function () {
//     Route::get('/table', 'TestController@index')->middleware('auth')->name('table');
//     Route::post('/table', 'TestController@store')->name('table.store');
//     Route::get('/col', 'ColumnController@index')->name('col.index');
//     Route::post('/col', 'ColumnController@store')->name('col.store');
// });


//Ligne CLI pour cascade <  composer require shiftonelabs/laravel-cascade-deletes
