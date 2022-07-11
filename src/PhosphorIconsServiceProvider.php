<?php

namespace WireUi\PhosphorIcons;

use Illuminate\Support\ServiceProvider;

class PhosphorIconsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfig();
    }

    protected function registerConfig(): void
    {
        $rootDir = __DIR__;

        $this->loadViewsFrom("{$rootDir}/views", 'wireui.phosphoricons');
        $this->mergeConfigFrom("{$rootDir}/config.php", 'wireui.phosphoricons');
         $this->publishes(
            ["{$rootDir}/config.php" => config_path('wireui/phosphoricons.php')],
            'wireui.phosphoricons.config'
        );
        $this->publishes(
            ["{$rootDir}/views" => resource_path('views/vendor/wireui/phosphoricons')],
            'wireui.phosphoricons.resources'
        );
    }
}
