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

Route::group(['prefix' => 'user'],function(){
    //首頁
    Route::get('/','UserController@index');
    //登入介面
    Route::get('/sign-in','UserController@signIn');
    //登入處理
    Route::post('/sign-in','UserController@signInProcess');
    //註冊介面
    Route::get('/sign-up','UserController@signUp');
    //註冊處理
    Route::post('/sign-up','UserController@signUpProcess')->middleware(['user.sign.up']);
    //註冊驗證
    Route::get('/verification/{user}/{code}','RegisterUserController@verification');
});