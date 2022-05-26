<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Gate::define('admin', function($user){
            return $user->role_id === User::ADMIN_ROLE_ID
                                    ? Response::allow()
                                    : Response::deny('YOU MUST BE AN ADMINISTRATOR');
        });

        Paginator::useBootstrap();
    }
}
