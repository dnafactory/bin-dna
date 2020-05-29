<?php

namespace App\Modules\Cms\Provider;

use Illuminate\Support\ServiceProvider;

class RegisterCmsServiceProvider extends ServiceProvider
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
        $source = base_path('envs') . '/cmsroots.php';
        $this->mergeConfigFrom($source, 'cms.roots');
    }
}
