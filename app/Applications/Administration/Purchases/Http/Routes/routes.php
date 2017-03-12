<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:53
 */
Route::group(['purchase', 'middleware' => ['auth']], function () {
    Route::get('/purchases', 'PurchasesController@index');
    Route::get('/purchase/datatable', 'PurchasesController@data_table');
    Route::get('/purchase/create', 'PurchasesController@create');
    Route::post('/purchase/store', 'PurchasesController@store');
    Route::get('/purchase/edit/{id}', 'PurchasesController@edit');
    Route::put('/purchase/update', 'PurchasesController@update');
    Route::post('/purchase/destroy', 'PurchasesController@destroy');
    Route::get('/purchase/autocomplete', 'PurchasesController@auto_complete');
    Route::post('/purchase/duplicate', 'PurchasesController@duplicate');
    Route::get('/purchase/report-exportpdf/{id}', 'PurchasesController@exportpdf');
});