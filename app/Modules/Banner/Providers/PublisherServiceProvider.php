<?php

namespace App\Modules\Banner\Providers;

use Illuminate\Support\ServiceProvider;

class PublisherServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
        module_path('banner', 'config/banner.php') => config_path('banner.php'),
          ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
