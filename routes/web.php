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

Route::post('api/register', 'AuthenticateController@register');
Route::post('api/authenticate', 'AuthenticateController@authenticate');
Route::get('api/authenticate/user', 'AuthenticateController@getAuthenticatedUser');