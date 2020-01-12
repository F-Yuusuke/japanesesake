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
Route::get('/sakagura', 'SakaguraController@index')->name('sakagura.index'); 

// 酒蔵側の認証機能
// 以下のページはログインしているときのみ表示
Route::group(['middleware' => 'auth'], function() {


});

Auth::routes();


