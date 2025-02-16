<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;
use Illuminate\View\ViewException;

class Input extends Component
{
    public function __construct(
        public string $name,
        public string $type = 'text',
        public ?string $label = null,
        public ?string $value = null,
        public ?string $placeholder = null,
        public ?bool $required = false,
        public ?bool $disabled = false
    ) {
        $this->validateType();
    }

    protected function validateType(): void
    {
        $validTypes = ['text', 'email', 'password', 'number', 'tel', 'url', 'search', 'date'];

        if (!in_array($this->type, $validTypes)) {
            throw new ViewException('Invalid input type');
        }
    }

    public function render()
    {
        return view('components.form.input');
    }
}
