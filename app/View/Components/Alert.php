<?php

namespace App\View\Components;

use Illuminate\View\Component;
use InvalidArgumentException;

class Alert extends Component
{
    private const ALLOWED_TYPES = [
        'success',
        'error',
        'warning',
        'info'
    ];

    private const TYPE_CONFIG = [
        'success' => [
            'text_color' => 'text-green-800',
            'bg_color' => 'bg-green-50'
        ],
        'error' => [
            'text_color' => 'text-red-800',
            'bg_color' => 'bg-red-50'
        ],
        'warning' => [
            'text_color' => 'text-yellow-800',
            'bg_color' => 'bg-yellow-50'
        ],
        'info' => [
            'text_color' => 'text-blue-800',
            'bg_color' => 'bg-blue-50'
        ]
    ];

    public string $textColor;
    public string $bgColor;

    public function __construct(
        public string $type
    ) {
        if (!in_array($type, self::ALLOWED_TYPES)) {
            throw new InvalidArgumentException(
                'Alert type must be one of: ' . implode(', ', self::ALLOWED_TYPES)
            );
        }

        $config = self::TYPE_CONFIG[$type];
        $this->textColor = $config['text_color'];
        $this->bgColor = $config['bg_color'];
    }

    public function render()
    {
        return view('components.alert');
    }
}
