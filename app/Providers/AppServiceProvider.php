<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use \Schema;
use \Auth;
use \App\Models\User;

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
        if (config('app.env') === 'local' && Schema::hasTable('users')) {
            $user = User::find(1);
            if ($user) {
                Auth::login($user);
            }
        }
    }
}
