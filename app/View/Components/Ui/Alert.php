<?php

namespace App\View\Components\Ui;

use App\View\Components\Contracts\HasColors;
use App\View\Components\Enums\AlertType;
use Illuminate\View\Component;
use Illuminate\View\ViewException;

class Alert extends Component implements HasColors
{
    public AlertType $alertType;

    public function __construct(
        string $type = 'info',
        public ?bool $dismissible = false
    ) {
        $this->alertType = AlertType::tryFrom($type) ?? throw new ViewException(
            'Alert type must be one of: ' . implode(', ', array_column(AlertType::cases(), 'value'))
        );
    }

    public function typeClasses(?string $additionalClasses = null): string
    {
        $classes = match ($this->alertType->value) {
            'success' => 'bg-green-100 text-green-800',
            'error' => 'bg-red-100 text-red-800',
            'info' => 'bg-blue-100 text-blue-800',
            default => 'bg-blue-100 text-blue-800',
        };

        return $additionalClasses ? "{$classes} {$additionalClasses}" : $classes;
    }

    public function render()
    {
        return view('components.ui.alert');
    }
}
