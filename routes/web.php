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

Auth::routes();
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@postLogin']);
Route::post('register', ['as' => 'register.post', 'uses' => 'Auth\RegisterController@postRegister']);

Route::group(['prefix'=>'superadmin','namespace'=>'Superadmin','middleware' => ['auth','admin.check'], 'roles'=>['superadmin']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('student','StudentController');
    Route::resource('paper','PaperController');
    Route::resource('review','ReviewController');
});

Route::group(['prefix'=>'judge','namespace'=>'Judge','middleware' => ['auth','admin.check'], 'roles'=>['judge']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('paper','PaperController');
    Route::resource('review','ReviewController');
});

Route::group(['prefix'=>'company','namespace'=>'Company','middleware' => ['auth','admin.check'], 'roles'=>['company']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('paper','PaperController');
    Route::resource('review','ReviewController');
});

Route::group(['prefix'=>'student','namespace'=>'Student','middleware' => ['auth','admin.check'], 'roles'=>['student ']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('paper','PaperController');
});

