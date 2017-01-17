<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 22/05/16
 * Time: 11:18
 */

Route::group(['city'], function () {
    Route::get('/cities_by_uf/{id}', 'CitiesController@get_by_state_id');
    Route::get('/get_zipcode/{zip}', 'CitiesController@get_zipcode');
});