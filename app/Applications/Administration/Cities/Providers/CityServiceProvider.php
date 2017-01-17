<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 22/05/16
 * Time: 11:15
 */

namespace App\Applications\Administration\Cities\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CityServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes($this->app['router']);
    }

    public function register()
    {
        App::bind('App\Domains\Cities\CitiesRepositoryInterface', 'App\Domains\Cities\CitiesRepository');
    }

    public function registerRoutes(Router $router)
    {
        $router->group([
            'namespace'  => 'App\Applications\Administration\Cities\Http\Controllers',
            'prefix'     => 'dashboard',
            'middleware' => 'web',
        ], function ($router) {
            require app_path('Applications/Administration/Cities/Http/Routes/routes.php');
        });
    }
}