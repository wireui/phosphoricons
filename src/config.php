<?php

return [
    /*
        |--------------------------------------------------------------------------
        | Icons Variants
        |--------------------------------------------------------------------------
        |
        | The icon variant can be thin, light, fill, regular, duotone, bold
        | See the PhosphorIcons variants for more information.
        | <x-icon bold />
        | <x-icon duotone />
        | <x-icon variant="thin" />
        |
    */
    'variant' => env('WIREUI_PHOSPHOR_ICONS_VARIANT', 'regular'),

    /*
        |--------------------------------------------------------------------------
        | Icon component alias
        |--------------------------------------------------------------------------
        |
        | The component alias to import in the blade/livewire component
        | Set to false to disable the component.
        | <x-icon ... />
        |
    */
    'alias' => env('WIREUI_PHOSPHOR_ICONS_ALIAS', 'icon'),
];
