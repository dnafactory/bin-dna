<?php

namespace App\Modules\Database\Provider;

use Illuminate\Support\ServiceProvider;

class RegisterConnectionsServiceProvider extends ServiceProvider
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
        $source = base_path('envs') . '/connections.php';
        $this->mergeConfigFrom($source, 'database.connections');
    }
}
