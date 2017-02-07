<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:53
 */
Route::group(['customer', 'middleware' => ['auth']], function () {
    Route::get('/customers', 'CustomersController@index');
    Route::get('/customer/datatable', 'CustomersController@data_table');
    Route::get('/customer/create', 'CustomersController@create');
    Route::post('/customer/store', 'CustomersController@store');
    Route::get('/customer/edit/{id}', 'CustomersController@edit');
    Route::put('/customer/update', 'CustomersController@update');
    Route::post('/customer/destroy', 'CustomersController@destroy');
    Route::post('/customer/search', 'CustomersController@search');
    Route::get('/customer/autocomplete', 'CustomersController@auto_complete');

    Route::get('/customer/campos', 'CustomersController@campos');
    Route::post('/customer/search-id', 'CustomersController@searchById');
});