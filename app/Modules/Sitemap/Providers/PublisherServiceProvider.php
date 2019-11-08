<?php

namespace App\Modules\Sitemap\Providers;

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
        module_path('sitemap', 'config/sitemap.php') => config_path('sitemap.php'),
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
