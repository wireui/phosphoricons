<?php

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\{Factory, FileViewFinder};

it('should register the views path', function () {
    /** @var Factory $view */
    $view = View::getFacadeRoot();

    /** @var FileViewFinder $finder */
    $finder = $view->getFinder();
    expect($finder->getHints())->toHaveKey('phosphor.icons');
    expect($finder->getHints()['phosphor.icons'][0])->toContain('src/views');
});

it('should merge the wireui.phosphoricons config', function () {
    expect(config('wireui.phosphoricons'))->toHaveKeys([
        'variant',
        'alias',
    ]);
});

it('should add the publish groups', function () {
    $publishGroups = ServiceProvider::$publishGroups;

    expect($publishGroups)->toHaveKeys([
        'wireui.phosphoricons.config',
        'wireui.phosphoricons.views',
    ]);

    expect($publishGroups['wireui.phosphoricons.config'])->toBeArray()->toHaveCount(1);
    expect($publishGroups['wireui.phosphoricons.views'])->toBeArray()->toHaveCount(1);

    expect(array_key_first($publishGroups['wireui.phosphoricons.config']))->toBeFile();
    expect(array_key_first($publishGroups['wireui.phosphoricons.views']))->toBeDirectory();

    expect(array_values($publishGroups['wireui.phosphoricons.config'])[0])->toEndWith('config/wireui/phosphoricons.php');
    expect(array_values($publishGroups['wireui.phosphoricons.views'])[0])->toEndWith('resources/views/vendor/wireui/phosphoricons');
});

it('should register the blade components', function () {
    /** @var BladeCompiler $bladeCompiler */
    $bladeCompiler = resolve(BladeCompiler::class);

    expect($bladeCompiler->getClassComponentAliases())->toHaveKey('icon');
});
