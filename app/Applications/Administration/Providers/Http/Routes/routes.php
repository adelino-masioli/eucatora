<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:53
 */
Route::group(['provider'], function () {
    Route::get('/providers', 'ProvidersController@index');
    Route::get('/provider/datatable', 'ProvidersController@data_table');
    Route::get('/provider/create', 'ProvidersController@create');
    Route::post('/provider/store', 'ProvidersController@store');
    Route::get('/provider/edit/{id}', 'ProvidersController@edit');
    Route::put('/provider/update', 'ProvidersController@update');
    Route::post('/provider/destroy', 'ProvidersController@destroy');
    Route::post('/provider/search', 'ProvidersController@search');
    Route::get('/provider/autocomplete', 'ProvidersController@auto_complete');

    Route::get('/provider/campos', 'ProvidersController@campos');
    Route::post('/provider/search-id', 'ProvidersController@searchById');
});