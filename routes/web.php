<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



//////////////////////////////////////////////
// ГЛАВНАЯ СТРАНИЦА
//////////////////////////////////////////////

Route::get('/', function () {
  return view('welcome');
});



//////////////////////////////////////////////
// РЕГИСТРАЦИЯ, ВХОД, ВОССТАНОВЛЕНИЕ ПАРОЛЯ
//////////////////////////////////////////////

Auth::routes();



//////////////////////////////////////////////
// ПАНЕЛЬ
//////////////////////////////////////////////

Route::group(['namespace' => 'Panel', 'prefix' => 'panel', 'middleware' => 'auth'], function () {
  // Главная страница
  Route::get('/', 'MainController@index');
  // Подтверждение почты
  Route::get('/confirmation', 'ConfirmationController@confirmationNotification');
  Route::post('/confirmation', 'ConfirmationController@confirmationResend');
  Route::get('/confirmation/user/{id}/token/{token}', 'ConfirmationController@confirmation');
});
