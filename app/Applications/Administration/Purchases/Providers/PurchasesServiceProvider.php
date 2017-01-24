<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:54
 */

namespace App\Applications\Administration\Purchases\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class PurchasesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes($this->app['router']);
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'purchases');
    }

    public function register()
    {
        App::bind('App\Domains\Purchases\PurchasesRepositoryInterface', 'App\Domains\Purchases\PurchasesRepository');
    }

    public function registerRoutes(Router $router)
    {
        $router->group([
            'namespace'  => 'App\Applications\Administration\Purchases\Http\Controllers',
            'prefix'     => 'dashboard',
            'middleware' => 'web',
        ], function ($router) {
            require app_path('Applications/Administration/Purchases/Http/Routes/routes.php');
        });
    }
}
