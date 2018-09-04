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
    return redirect('students');
});
Route::group(['namespace' => 'Auth'], function () {
    Route::get('logout', 'LoginController@logout')->name('logout');
});
//Student:学员
Route::resource('students', 'StudentsController');
//Wechat:与微信对接
Route::any('wechat', 'WeChatController@serve');
Route::get('wechat/callback', 'WeChatController@callback')->name('wechat.callback');
Route::get('wechat/menu', 'WeChatController@menu')->name('wechat.menu');
