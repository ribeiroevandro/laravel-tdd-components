<?php

namespace App\View\Components\Ui;

use App\View\Components\Contracts\HasColors;
use App\View\Components\Enums\AlertType;
use Illuminate\View\Component;
use Illuminate\View\ViewException;

class Alert extends Component implements HasColors
{
    public AlertType $alertType;
    public bool $dismissible = false;

    public function __construct(
        string $type = 'info',
        bool $dismissible = false
    ) {
        $this->alertType = AlertType::tryFrom($type) ?? throw new ViewException(
            'Alert type must be one of: ' . implode(', ', array_column(AlertType::cases(), 'value'))
        );
        $this->dismissible = $dismissible;
    }

    public function typeClasses(string $additionalClasses = ''): string
    {
        $baseClasses = $this->alertType->classes();
        return trim($baseClasses . ' ' . $additionalClasses);
    }

    public function render()
    {
        return view('components.ui.alert');
    }
}
