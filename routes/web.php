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

Route::get('/event', 'EventController@index')->name('event.index');
Route::get('/event', 'EventController@index')->name('event.index');
Route::delete('event/{event}/delete', 'EventController@destroy')->name('event.destroy'); // 削除処理
 
