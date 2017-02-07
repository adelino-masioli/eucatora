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

$path = '\App\Applications\Administration\Providers\Http\Controllers';

Route::get('/', ['as' => 'home', 'uses' => $path.'\ProvidersController@index']);
Route::get('/dashboard', ['as' => 'home', 'uses' => $path.'\ProvidersController@index']);