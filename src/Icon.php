<?php

namespace WireUi\PhosphorIcons;

use Illuminate\View\Component;

enum Variant: string
{
    case Thin    = 'thin';
    case Light   = 'light';
    case Regular = 'regular';
    case Fill    = 'fill';
    case Duotone = 'duotone';
    case Bold    = 'bold';
}

class Icon extends Component
{
    public function __construct(
        public string $name,
        public ?Variant $variant,
        public bool $thin = false,
        public bool $light = false,
        public bool $regular = false,
        public bool $fill = false,
        public bool $duotone = false,
        public bool $bold = false,
    ) {
        $this->variant = $this->getVariant();
    }

    public function render()
    {
        return view('wireui.phosphoricons::components.icon');
    }

    private function getVariant(): string
    {
        if ($this->variant) {
            return $this->variant;
        }

        if ($this->thin) {
            return 'thin';
        }

        if ($this->light) {
            return 'light';
        }

        if ($this->regular) {
            return 'regular';
        }

        if ($this->fill) {
            return 'fill';
        }

        if ($this->duotone) {
            return 'duotone';
        }

        if ($this->bold) {
            return 'bold';
        }

        return config('wireui.phosphoricons.variant');
    }
}
