<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\{Collection, Str};
use Symfony\Component\Finder\{Finder, SplFileInfo};
use WireUi\PhosphorIcons\Icon;

function getIcons(string $variant): Collection
{
    $files = (new Finder())->files()->in(__DIR__ . "/../../src/views/components/{$variant}");

    return collect($files)->map(fn (SplFileInfo $file) => [
        'icon'    => Str::of($file->getFilename())->before('.blade.php')->toString(),
        'variant' => $variant,
    ]);
}

it('should get the default icon variant', function () {
    $icon = new Icon(name: 'house');

    $parsedStyle = test()->invokeMethod($icon, 'getVariant');

    expect($parsedStyle)->toBe('regular');
});

it('should make the icon blade view', function () {
    $icon = new Icon(name: 'house', thin: true);

    $view = $icon->render();

    $parsedStyle = test()->invokeMethod($icon, 'getVariant');

    expect($view->name())->toEndWith('components.thin.house');
    expect($parsedStyle)->toBe('thin');
});

it('should get the correct icon variant', function (string $expected, Icon $icon) {
    $parsedStyle = test()->invokeMethod($icon, 'getVariant');

    expect($parsedStyle)->toBe($expected);
})->with([
    ['regular', new Icon(name: 'house', variant: 'regular')],
    ['thin',    new Icon(name: 'house', thin: true)],
    ['light',   new Icon(name: 'house', light: true)],
    ['regular', new Icon(name: 'house', regular: true)],
    ['fill',    new Icon(name: 'house', fill: true)],
    ['duotone', new Icon(name: 'house', duotone: true)],
    ['bold',    new Icon(name: 'house', bold: true)],
]);

it('should render all components with attributes', function (string $icon, string $variant) {
    $html = Blade::render(<<<BLADE
        <x-icon name="{$icon}" variant="{$variant}" class="w-5 h-5" style="foo: bar" />

        <x-phosphor.icons::{$variant}.{$icon} class="w-10 h-10" />
    BLADE);

    $view = (new Icon(name: $icon, variant: $variant))->render();

    expect($view->name())->toBe("phosphor.icons::components.{$variant}.{$icon}");

    expect($html)
        ->toContain('<svg')
        ->toContain('</svg>')
        ->toContain('class="w-5 h-5"')
        ->toContain('class="w-10 h-10"')
        ->toContain('style="foo: bar"')
        ->not->toContain('<x-icon')
        ->not->toContain('<x-phosphor.icons');
})->with(
    collect()
        ->push(getIcons('thin'))
        ->push(getIcons('light'))
        ->push(getIcons('regular'))
        ->push(getIcons('fill'))
        ->push(getIcons('duotone'))
        ->push(getIcons('bold'))
        ->collapse()
        ->toArray(),
);
