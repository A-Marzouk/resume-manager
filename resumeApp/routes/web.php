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


Route::get('/','HomeController@welcomePage')->name('welcome');

Route::prefix('client')->group(function (){
    Route::get('/login','Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::get('/logout','Auth\ClientLoginController@logout')->name('client.logout');
    Route::post('/login/submit','Auth\ClientLoginController@login')->name('client.login.submit');
    Route::get('/','ClientsController@index')->name('client.dashboard');
    Route::get('/register','Auth\ClientRegisterController@showRegistrationForm')->name('client.register');
    Route::post('/register/submit','Auth\ClientRegisterController@register')->name('client.register.submit');
});

Route::prefix('admin')->group(function (){
    Route::get('/','adminsController@form')->name('admin');
    Route::post('/','UserDataController@store');
});

Auth::routes();

Route::prefix('freelancer')->group(function (){
    Route::get('/login','Auth\LoginController@showLoginForm')->name('freelancer.login');
    Route::get('/logout','Auth\LoginController@logout')->name('freelancer.logout');
    Route::post('/login/submit','Auth\LoginController@login')->name('freelancer.login.submit');
    Route::get('/','ClientsController@index')->name('freelancer.dashboard');
    Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('freelancer.register');
    Route::post('/register/submit','Auth\RegisterController@register')->name('freelancer.register.submit');
});

Route::get('/{username}','HomeController@ResumePage');
