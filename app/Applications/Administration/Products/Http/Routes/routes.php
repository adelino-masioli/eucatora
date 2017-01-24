<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:53
 */
Route::group(['product'], function () {
    Route::get('/products', 'ProductsController@index');
    Route::get('/product/datatable', 'ProductsController@datatable');
    Route::get('/product/create', 'ProductsController@create');
    Route::post('/product/store', 'ProductsController@store');
    Route::get('/product/edit/{id}', 'ProductsController@edit');
    Route::put('/product/update', 'ProductsController@update');
    Route::post('/product/destroy', 'ProductsController@destroy');
    Route::post('/product/duplicate', 'ProductsController@duplicate');
    Route::get('/product/autocomplete', 'ProductsController@autocomplete');
    Route::get('/product/filter-by-id/{id}', 'ProductsController@filterById');
});