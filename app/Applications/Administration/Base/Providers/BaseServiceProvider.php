<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:08
 */
namespace App\Applications\Administration\Base\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'administration');
    }

    public function register()
    {
        App::bind('App\Domains\Status\StatusRepositoryInterface', 'App\Domains\Status\StatusRepository');
        App::bind('App\Domains\States\StatesRepositoryInterface', 'App\Domains\States\StatesRepository');
    }

}
