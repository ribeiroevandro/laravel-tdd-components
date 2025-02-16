<?php

namespace App\View\Components\Enums;

enum AlertType: string
{
    case SUCCESS = 'success';
    case ERROR = 'error';
    case WARNING = 'warning';
    case INFO = 'info';

    public function classes(): string
    {
        return match($this) {
            self::SUCCESS => 'bg-green-100 text-green-800',
            self::ERROR => 'bg-red-100 text-red-800',
            self::WARNING => 'bg-yellow-100 text-yellow-800',
            self::INFO => 'bg-blue-100 text-blue-800',
        };
    }
}
