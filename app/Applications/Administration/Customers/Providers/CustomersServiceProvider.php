<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:54
 */

namespace App\Applications\Administration\Customers\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CustomersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes($this->app['router']);
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'customers');
    }

    public function register()
    {
        App::bind('App\Domains\Customers\CustomersRepositoryInterface', 'App\Domains\Customers\CustomersRepository');
    }

    public function registerRoutes(Router $router)
    {
        $router->group([
            'namespace'  => 'App\Applications\Administration\Customers\Http\Controllers',
            'prefix'     => 'dashboard',
            'middleware' => 'web',
        ], function ($router) {
            require app_path('Applications/Administration/Customers/Http/Routes/routes.php');
        });
    }
}
