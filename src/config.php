<?php

return [
    /*
        |--------------------------------------------------------------------------
        | Icons Style
        |--------------------------------------------------------------------------
        |
        | The icon style can be thin, light, fill, regular, duotone, bold
        | <x-icon bold />
        | <x-icon duotone />
        | <x-icon variant="thin" />
        |
    */
    'style' => env('WIREUI_PHOSPHOR_ICONS_STYLE', 'regular'),

    /*
        |--------------------------------------------------------------------------
        | Icon component alias
        |--------------------------------------------------------------------------
        |
        | The component alias to import in the blade/livewire component
        | <x-icon ... />
        |
    */
    'alias' => env('WIREUI_PHOSPHOR_ICONS_ALIAS', 'icon'),
];
