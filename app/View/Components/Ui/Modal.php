<?php

namespace App\View\Components\UI;

use Illuminate\View\Component;

class Modal extends Component
{
    public function __construct(
        public ?string $title = null,
        public bool $closeable = true,
        public string $maxWidth = 'md'
    ) {}

    public function render()
    {
        return view('components.ui.modal');
    }

    public function maxWidthClass(): string
    {
        return "max-w-{$this->maxWidth}";
    }
}
