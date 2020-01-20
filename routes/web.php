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


Route::get('/event', 'EventController@index')->name('event.index');//一覧表示 ここの場合->name('event.index');はなくてもOK でも今後こっちの方が便利になるかもしれないから書いている
Route::delete('event/{event}/delete', 'EventController@destroy')->name('event.destroy'); // 削除処理
Route::get('/event/search', 'EventController@search')->name('event.search'); //->以降のコードはindex.blade.phpのアクションで指名してもらえるように同じ名前をかく
// '/event/search'は別に画面遷移するというわけではなく同じページでもURLは違っていてもOK
Route::get('/event', 'EventController@index')->name('event.index'); 
Route::get('/sakagura', 'SakaguraController@index')->name('sakagura.index'); 

// 酒蔵新規登録・ログイン・ログアウト用
Route::group(['prefix' => 'owner', 'middleware' => 'guest:owner'], function() {
    Route::get('/', function () {
        return view('sakagura');
    });
    
    

    Route::get('login', 'Owner\Auth\LoginController@showLoginForm')->name('owner.login');
    Route::post('login', 'Owner\Auth\LoginController@login')->name('owner.login');

    Route::get('register', 'Owner\Auth\RegisterController@showRegisterForm')->name('owner.register');
    Route::post('register', 'Owner\Auth\RegisterController@create')->name('owner.register');

    // Route::get('password/rest', 'Owner\Auth\ForgotPasswordController@showLinkRequestForm')->name('owner.password.request');
});

Route::group(['prefix' => 'owner', 'middleware' => 'auth:owner'], function(){
    Route::post('logout', 'Owner\Auth\LoginController@logout')->name('owner.logout');
    Route::get('home', 'Owner\HomeController@index')->name('owner.home');

});

// 酒蔵側の認証機能
// 以下のページはログインしているときのみ表示
// Route::get('/owner/mypage', 'Owner\Auth\OwnerMyPageController@index')->name('owner.mypage');
Route::group(['prefix' => 'owner','middleware' => 'auth'], function() {
    Route::get('owner/mypage', 'Owner\Auth\OwnerMyPageController@index')->name('owner.mypage');
});
                                // 👆はOwnerMypageController.phpのnamespace App\Http\Controllers\Owner\Auth;と同じ事をかく ここでlaravelさんに辿りついてもらうために書かないといけない じゃないと見つけてもらえなくなる

Auth::routes();




Route::get('/event', 'EventController@index')->name('event.index');
Route::get('event/create', 'EventController@event_create')->name('event.create');//イベント登録
Route::post('event/create', 'EventController@event_store')->name('event.store');//イベント保存
Route::delete('event/{event}/delete', 'EventController@destroy')->name('event.destroy'); // 削除処理

Route::get('event/{event}/edit', 'EventController@event_edit')->name('event.edit'); // 編集画面
Route::put('event/{event}/update', 'EventController@event_update')->name('event.update'); // 更新処理