<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Zencart\PluginManager\PluginManager;
use App\Models\PluginControl;
use App\Models\PluginControlVersion;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Add the admin path to view directories
         *
         */
        if (defined('DIR_FS_ADMIN')) {
            $currentPaths = config('view.paths');
            $currentPaths[] = DIR_FS_ADMIN . 'includes/templates/views';
            config(['view.paths' => $currentPaths]);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) return;
        $pluginManager = new PluginManager(new PluginControl, new PluginControlVersion);
        $pluginManager->inspectAndUpdate();
        $installedPlugins = $pluginManager->getInstalledPlugins();
        $this->app->instance('installedPlugins', $installedPlugins);
    }
}
