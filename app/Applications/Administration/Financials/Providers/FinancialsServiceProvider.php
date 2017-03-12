<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 19:54
 */

namespace App\Applications\Administration\Financials\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class FinancialsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes($this->app['router']);
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'financials');
    }

    public function register()
    {
        App::bind('App\Domains\Financials\FinancialsRepositoryInterface', 'App\Domains\Financials\FinancialsRepository');
        App::bind('App\Domains\Financials\FinancialChecksRepositoryInterface', 'App\Domains\Financials\FinancialChecksRepository');
    }

    public function registerRoutes(Router $router)
    {
        $router->group([
            'namespace'  => 'App\Applications\Administration\Financials\Http\Controllers',
            'prefix'     => 'dashboard',
            'middleware' => 'web',
        ], function ($router) {
            require app_path('Applications/Administration/Financials/Http/Routes/routes.php');
        });
    }
}
