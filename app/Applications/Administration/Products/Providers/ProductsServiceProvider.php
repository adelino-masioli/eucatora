<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:54
 */

namespace App\Applications\Administration\Products\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ProductsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes($this->app['router']);
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'products');
    }

    public function register()
    {
        App::bind('App\Domains\Products\ProductsRepositoryInterface', 'App\Domains\Products\ProductsRepository');
    }

    public function registerRoutes(Router $router)
    {
        $router->group([
            'namespace'  => 'App\Applications\Administration\Products\Http\Controllers',
            'prefix'     => 'dashboard',
            'middleware' => 'web',
        ], function ($router) {
            require app_path('Applications/Administration/Products/Http/Routes/routes.php');
        });
    }
}
