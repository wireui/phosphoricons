<?php

namespace WireUi\PhosphorIcons;

use Illuminate\Contracts\View\{Factory, View};
use Illuminate\View\Component;

class Icon extends Component
{
    public function __construct(
        public string $name,
        public ?string $variant = null,
        public bool $thin = false,
        public bool $light = false,
        public bool $regular = false,
        public bool $fill = false,
        public bool $duotone = false,
        public bool $bold = false,
    ) {
        $this->variant = $this->getVariant();
    }

    public function render(): View|Factory
    {
        return view("phosphor.icons::components.{$this->variant}.{$this->name}");
    }

    private function getVariant(): string
    {
        if ($this->variant) {
            return $this->variant;
        }

        $variants = ['thin', 'light', 'fill', 'regular', 'duotone', 'bold'];

        foreach ($variants as $variant) {
            if ($this->{$variant}) {
                return $variant;
            }
        }

        /** @var string */
        return config('wireui.phosphoricons.variant');
    }
}
