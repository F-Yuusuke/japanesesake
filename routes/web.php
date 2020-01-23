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

// ①topページ
Route::get('/event', 'EventController@index')->name('event.index');//一覧表示 ここの場合->name('event.index');はなくてもOK でも今後こっちの方が便利になるかもしれないから書いている
Route::get('/event/search', 'EventController@search')->name('event.search'); //->以降のコードはindex.blade.phpのアクションで指名してもらえるように同じ名前をかく
// '/event/search'は別に画面遷移するというわけではなく同じページでもURLは違っていてもOK



// ②酒蔵ログインしてる場合だけ行える処理
Route::group(['prefix' => 'owner', 'middleware' => 'auth:owner'], function () {
    // Route::get('/sakagura', 'SakaguraController@index')->name('sakagura.index');
    Route::get('/', 'Owner\OwnerController@mypage')->name('sakagura.mypage');
    Route::post('logout', 'Owner\Auth\LoginController@logout')->name('owner.logout');
    Route::get('event/create', 'EventController@event_create')->name('event.create');//イベント登録
    Route::post('event/create', 'EventController@event_store')->name('event.store');//イベント保存
    Route::delete('event/{event}/delete', 'EventController@destroy')->name('event.destroy'); // 削除処理
    Route::get('event/{event}/edit', 'EventController@event_edit')->name('event.edit'); // 編集画面
    Route::put('event/{event}/update', 'EventController@event_update')->name('event.update'); // 更新処理
});



// ③酒蔵ログインしてない場合だけ行える処理
Route::group(['prefix' => 'owner', 'middleware' => 'guest:owner'], function () {
    Route::get('login', 'Owner\Auth\LoginController@showLoginForm')->name('owner.login');
    Route::post('login', 'Owner\Auth\LoginController@login')->name('owner.login');
    Route::get('register', 'Owner\Auth\RegisterController@showRegisterForm')->name('owner.register');
    Route::post('register', 'Owner\Auth\RegisterController@create')->name('owner.register');
});



// ④外国人ユーザーがログインしてる場合だけ行える処理
Route::group(['middleware' => 'auth'], function () {
    Route::get('event/{id}/apply', 'EventController@event_apply')->name('event.apply'); // 申込画面
    Route::put('event/{id}/applyed', 'EventController@event_applyed')->name('event.applyed'); // 申込更新処理
    Route::delete('event/{id}/applydelete', 'EventController@event_applydestroy')->name('event.applydestroy'); // 申込削除処理
});



// ⑤外国人ユーザー認証関連
Auth::routes();
