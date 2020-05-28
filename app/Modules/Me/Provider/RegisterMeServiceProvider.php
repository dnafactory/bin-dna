<?php

namespace App\Modules\Me\Provider;

use Illuminate\Support\ServiceProvider;

class RegisterMeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $source = base_path('envs') . '/me.php';
        $this->mergeConfigFrom($source, 'me');
    }
}
