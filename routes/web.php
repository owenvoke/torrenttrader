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

Route::get('/', 'TorrentController@index')->name('index');

// Torrents
Route::resource('torrents', 'TorrentController');

// Groups
Route::resource('groups', 'GroupController');

// Authenticated only routes
Route::group(['middleware' => ['auth']], function () {
});

// Authentication
Auth::routes();
