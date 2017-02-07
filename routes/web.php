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

$path  = '\App\Applications\Administration\Auth\Http\Controllers';

Auth::routes();
Route::get('/', ['as' => 'home', 'uses' => $path.'\AuthController@index']);
Route::get('home', function (){
    return redirect('dashboard/providers');
});
Route::get('logout', ['as' => 'logout', 'uses' => $path.'\AuthController@getLogout']);
Route::get('dashboard', function (){
    return redirect('dashboard/providers');
});