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
Route::get('/sakagura/mypage', 'SakaguraController@mypage')->name('sakagura.mypage'); 



Route::group(['prefix' => 'owner', 'middleware' => 'guest:owner'], function() {
    Route::get('/', function () {
        return view('sakagura.welcome');
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
Route::group(['middleware' => 'auth'], function() {


});

Auth::routes();


