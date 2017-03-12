<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:53
 */
Route::group(['sale', 'middleware' => ['auth']], function () {
    Route::get('/sales', 'SalesController@index');
    Route::get('/sale/datatable', 'SalesController@data_table');
    Route::get('/sale/create', 'SalesController@create');
    Route::post('/sale/store', 'SalesController@store');
    Route::get('/sale/edit/{id}', 'SalesController@edit');
    Route::put('/sale/update', 'SalesController@update');
    Route::post('/sale/updateshipp', 'SalesController@updateShipp');
    Route::post('/sale/destroy', 'SalesController@destroy');
    Route::get('/sale/autocomplete', 'SalesController@auto_complete');
    Route::post('/sale/duplicate', 'SalesController@duplicate');

    Route::post('/sale/add-item', 'SalesController@addItem');
    Route::post('/sale/destroy-item', 'SalesController@destroyItem');
    Route::post('/sale/add-tax', 'SalesController@addTax');
    Route::post('/sale/destroy-tax', 'SalesController@destroyTax');
    Route::post('/sale/destroy-tax', 'SalesController@destroyTax');

    Route::get('/sale/report-exportpdf/{id}', 'SalesController@exportpdf');
});