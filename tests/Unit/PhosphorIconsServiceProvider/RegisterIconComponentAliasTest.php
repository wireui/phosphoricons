<?php

use Illuminate\View\Compilers\BladeCompiler;

beforeEach(fn () => config()->set('wireui.phosphoricons.alias', 'custom-icon'));

it('should register the icon blade component with a custom alias', function () {
    /** @var BladeCompiler $bladeCompiler */
    $bladeCompiler = resolve(BladeCompiler::class);

    $aliases = $bladeCompiler->getClassComponentAliases();

    expect($aliases)->toMatchArray(
        [
            'dynamic-component' => "Illuminate\View\DynamicComponent",
            'custom-icon'       => "WireUi\PhosphorIcons\Icon",
        ]
    );

    expect(config())
        ->get('wireui.phosphoricons.alias')
        ->toBe('custom-icon');
});
