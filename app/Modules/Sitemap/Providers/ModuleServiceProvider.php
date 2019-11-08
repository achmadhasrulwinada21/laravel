<?php

namespace App\Modules\Sitemap\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(module_path('sitemap', 'Resources/Lang', 'app'), 'sitemap');
        $this->loadViewsFrom(module_path('sitemap', 'Resources/Views', 'app'), 'sitemap');
        $this->loadMigrationsFrom(module_path('sitemap', 'Database/Migrations', 'app'), 'sitemap');
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('sitemap', 'Config', 'app'));
        }
        $this->loadFactoriesFrom(module_path('sitemap', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
