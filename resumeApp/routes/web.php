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


Route::get('/','HomeController@index');

Route::prefix('client')->group(function (){
    Route::get('/login','Auth\ClientLoginController@showLoginForm')->name('client.login');
    Route::post('/login/submit','Auth\ClientLoginController@login')->name('client.login.submit');
    Route::get('/','ClientsController@index')->name('client.dashboard');
    Route::get('/login','Auth\ClientRegisterController@showLoginForm')->name('client.register');
    Route::post('/register/submit','Auth\ClientRegisterController@showRegistrationForm')->name('client.register.submit');
});

Route::prefix('admin')->group(function (){
    Route::get('/','adminsController@form');
    Route::post('/','UserDataController@store');
});

Auth::routes();
Route::get('/{username}','HomeController@welcomePage');
