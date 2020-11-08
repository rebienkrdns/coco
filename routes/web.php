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

Route::group(["middleware" => ["web"]], function () {
  Route::get('/', function () {
    return view('welcome');
  });

  Auth::routes();
  Route::post('/customer/register', 'AppController@customerRegister');
});

Route::group(["middleware" => ["web", "auth"]], function () {
  Route::get('/home', 'AppController@index')->name('home');
  Route::resource('account', 'AccountController');
});

Route::group(["middleware" => ["web", "auth", "role:Cliente"]], function () {
  Route::resource('files', 'FilesController');
  Route::get('/file/{file}', 'FilesController@get');
});

Route::group(["middleware" => ["web", "auth", "role:Administrador"]], function () {
  Route::resource('customers', 'CustomersController');
  Route::resource('plans', 'PlansController');
});
