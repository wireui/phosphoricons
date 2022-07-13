<?php

namespace WireUi\PhosphorIcons;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class PhosphorIconsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerConfig();
        $this->registerBladeComponents();
    }

    protected function registerConfig(): void
    {
        $rootDir = __DIR__;

        $this->loadViewsFrom("{$rootDir}/views", 'wireui.phosphor');
        $this->mergeConfigFrom("{$rootDir}/config.php", 'wireui.phosphoricons');
        $this->publishes(
            ["{$rootDir}/config.php" => config_path('wireui/phosphoricons.php')],
            'wireui.phosphoricons.config'
        );
        $this->publishes(
            ["{$rootDir}/views" => resource_path('views/vendor/wireui/phosphoricons')],
            'wireui.phosphoricons.views'
        );
    }

    protected function registerBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, static function (BladeCompiler $blade): void {
            $blade->component(Icon::class, config('wireui.phosphoricons.alias'));
        });
    }
}
