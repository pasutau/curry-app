<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    //トップ画面
    Route::get('/', function () {
        return view('index');
    });

    //ログイン画面
    Route::get('login', function () {
        return view('login');
    });

    Route::post('login', function () {
        return view('disp');
    });

    //ID登録画面
    Route::get('register', function() {
        return view('register');
    });

    //ユーザ登録フォーム送信時
    Route::post('register', 'App\Http\Controllers\UserRegistController@register')->name('register');

    //画像投稿画面表示時
    Route::get('/image_upload', function() {
        return view('image_upload');
    });

    //画像一覧表示
    Route::get('disp', 'App\Http\Controllers\ImageController@index')->name('index');

    //投稿ボタンを押した時
    Route::post('upload', 'App\Http\Controllers\ImageController@upload')->name('upload');

});


//認証メソッド定義
Auth::routes();


