<?php

namespace App\Modules\Filesystem\Provider;

use Illuminate\Support\ServiceProvider;

class RegisterDisksServiceProvider extends ServiceProvider
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
        $source = base_path('envs') . '/disks.php';
        $this->mergeConfigFrom($source, 'filesystems.disks');
    }
}
