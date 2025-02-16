<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\View\ViewException;

test('can render alert component', function () {
    $result = Blade::render(
        '<x-alert type="success">Test success message</x-alert>'
    );

    expect($result)
        ->toContain('Test success message')
        ->toContain('success')
        ->toBeString();
});

test('alert component accepts different types', function () {
    $typeConfigs = [
        'success' => ['bg-green-50', 'text-green-800'],
        'error' => ['bg-red-50', 'text-red-800'],
        'warning' => ['bg-yellow-50', 'text-yellow-800'],
        'info' => ['bg-blue-50', 'text-blue-800'],
    ];

    foreach ($typeConfigs as $type => $classes) {
        $result = Blade::render(
            '<x-alert type="' . $type . '">Alert message</x-alert>'
        );

        expect($result)
            ->toContain('Alert message')
            ->toContain($classes[0])
            ->toContain($classes[1])
            ->toBeString();
    }
});

test('alert component throws exception for invalid type', function () {
    expect(fn () => Blade::render(
        '<x-alert type="invalid">Alert message</x-alert>'
    ))->toThrow(ViewException::class)
     ->and(fn () => Blade::render(
        '<x-alert type="invalid">Alert message</x-alert>'
    ))->toThrow('Alert type must be one of: success, error, warning, info');
});

test('alert component throws exception for empty type', function () {
    expect(fn () => Blade::render(
        '<x-alert type="">Alert message</x-alert>'
    ))->toThrow(ViewException::class)
     ->and(fn () => Blade::render(
        '<x-alert type="">Alert message</x-alert>'
    ))->toThrow('Alert type must be one of: success, error, warning, info');
});

test('alert component renders with correct styling for each type', function () {
    $expectedStyles = [
        'success' => [
            'text' => 'text-green-800',
            'bg' => 'bg-green-50'
        ],
        'error' => [
            'text' => 'text-red-800',
            'bg' => 'bg-red-50'
        ],
        'warning' => [
            'text' => 'text-yellow-800',
            'bg' => 'bg-yellow-50'
        ],
        'info' => [
            'text' => 'text-blue-800',
            'bg' => 'bg-blue-50'
        ],
    ];

    foreach ($expectedStyles as $type => $styles) {
        $result = Blade::render(
            sprintf('<x-alert type="%s">Test message</x-alert>', $type)
        );

        $renderedHtml = (string) $result;

        expect($renderedHtml)
            ->toContain($styles['text'])
            ->toContain($styles['bg']);
    }
});
