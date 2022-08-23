<?php

use Illuminate\View\Compilers\BladeCompiler;

beforeEach(fn () => config()->set('wireui.phosphoricons.alias', false));

it('should not register the icon component', function () {
    /** @var BladeCompiler $bladeCompiler */
    $bladeCompiler = resolve(BladeCompiler::class);

    $aliases = $bladeCompiler->getClassComponentAliases();

    expect($aliases)->toMatchArray(
        [
            0                   => "WireUi\PhosphorIcons\Icon",
            'dynamic-component' => "Illuminate\View\DynamicComponent",
        ]
    );

    expect(config())
        ->get('wireui.phosphoricons.alias')
        ->toBeFalse();
});
