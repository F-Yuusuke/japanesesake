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
Route::get('event/create', 'EventController@event_create')->name('event.create');//イベント登録
Route::post('event/create', 'EventController@event_store')->name('event.store');//イベント保存
Route::delete('event/{event}/delete', 'EventController@destroy')->name('event.destroy'); // 削除処理

Route::get('event/{event}/edit', 'EventController@event_edit')->name('event.edit'); // 編集画面
Route::put('event/{event}/update', 'EventController@event_update')->name('event.update'); // 更新処理
