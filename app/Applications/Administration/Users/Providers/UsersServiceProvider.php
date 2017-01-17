<?php
/**
 * Created by PhpStorm.
 * User: alfjuniorbh
 * Date: 16/10/16
 * Time: 20:08
 */
namespace App\Applications\Administration\Users\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class UsersServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'users');
    }

    public function register()
    {
        App::bind('App\Domains\Users\UsersRepositoryInterface', 'App\Domains\Users\UsersRepository');
    }

}
