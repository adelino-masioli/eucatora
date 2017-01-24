<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:53
 */
Route::group(['purchase'], function () {
    Route::get('/Sales', 'SalesController@index');
    Route::get('/purchase/datatable', 'SalesController@data_table');
    Route::get('/purchase/create', 'SalesController@create');
    Route::post('/purchase/store', 'SalesController@store');
    Route::get('/purchase/edit/{id}', 'SalesController@edit');
    Route::put('/purchase/update', 'SalesController@update');
    Route::post('/purchase/destroy', 'SalesController@destroy');
    Route::get('/purchase/autocomplete', 'SalesController@auto_complete');

    Route::post('/purchase/add-item', 'SalesController@addItem');
    Route::post('/purchase/destroy-item', 'SalesController@destroyItem');
    Route::post('/purchase/add-tax', 'SalesController@addTax');
    Route::post('/purchase/destroy-tax', 'SalesController@destroyTax');
});