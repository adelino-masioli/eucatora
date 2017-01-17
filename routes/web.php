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

$path = '\App\Applications\Site\Sites\Http\Controllers';

Route::get('/', ['as' => 'home', 'uses' => $path.'\SitesController@index']);
Route::get('produto/{slug}', ['as' => 'produto', 'uses' => $path.'\SitesController@detail']);
Route::get('produto-configuracao/{slug}/{id}', ['as' => 'configuracao', 'uses' => $path.'\SitesController@configure']);

//order
Route::group(['order'], function () {
    $path = '\App\Applications\Site\Sites\Http\Controllers';

    Route::post('/order/adicionar-produto', $path.'\SitesController@addItem');
});


// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});
// Home > produto
Breadcrumbs::register('produto', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($product->name, route('produto', $product->id));
});
// Home > produto > configuracao
Breadcrumbs::register('configuracao', function($breadcrumbs, $product)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push($product->name, route('produto', $product->seo_url));
    $breadcrumbs->push('Configuração', route('produto', $product->id));
});