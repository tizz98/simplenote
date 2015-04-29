<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
	'as' => 'index',
	'uses' => 'WelcomeController@index'
]);

Route::get('home', [
	'as' => 'home',
	'uses' => 'HomeController@index'
]);

/*
 * Registration
 */
Route::get('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create'
]);
Route::post('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);
Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'RegistrationController@confirm'
]);

/*
 * Sessions
 */
Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
]);
Route::post('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@store'
]);
Route::get('logout', [
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy',
]);
