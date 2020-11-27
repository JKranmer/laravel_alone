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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'panel','name' => 'panel'], function () {
	// Login ** fora do middleware
	Route::prefix('login')->group(function (){
		Route::get('', '\App\Http\Controllers\Panel\LoginController@login')->name('panel.login');
		Route::post('authenticate', '\App\Http\Controllers\Panel\LoginController@authenticate');
		Route::get('logout', '\App\Http\Controllers\Panel\LoginController@logout');
	});

	// MIDDLEWARE  => Altenticação do login ... se ñ... refireciona para login
	Route::group(['middleware' => 'auth'], function(){
		
		Route::get('', '\App\Http\Controllers\Panel\HomeController@list');
		
		// Agrupamento do User
		Route::prefix('user')->group(function (){
			Route::get('', '\App\Http\Controllers\Panel\UserController@list');
			Route::get('insert', '\App\Http\Controllers\Panel\UserController@insert');
			Route::get('update/{i}', '\App\Http\Controllers\Panel\UserController@insert');
			Route::post('save', '\App\Http\Controllers\Panel\UserController@save');
			Route::get('delete/{i}', '\App\Http\Controllers\Panel\UserController@delete');
			Route::get('enable/{i}', '\App\Http\Controllers\Panel\UserController@enable');
		});
	
		// Agrupamento do UserType
		Route::prefix('user_type')->group(function (){
			// Sintax 'Rota' , 'Adress Controller + Name Controller + @ nameFunction'
			Route::get('', '\App\Http\Controllers\Panel\UserTypeController@list');
			Route::get('insert', '\App\Http\Controllers\Panel\UserTypeController@insert');
			Route::get('update/{i}', '\App\Http\Controllers\Panel\UserTypeController@insert');
			Route::post('save', '\App\Http\Controllers\Panel\UserTypeController@save');
			Route::get('delete/{i}', '\App\Http\Controllers\Panel\UserTypeController@delete');
			Route::get('enable/{i}', '\App\Http\Controllers\Panel\UserTypeController@enable');
		});
		
	});
});