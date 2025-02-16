<?php

use Illuminate\Support\Facades\Blade;

test('it can render alert with default values', function () {
    $result = Blade::render('<x-ui.alert>Test Message</x-ui.alert>');

    expect($result)
        ->toContain('Test Message')
        ->toContain('bg-blue-100')
        ->toContain('text-blue-800')
        ->not->toContain('data-dismissible');
});

test('it can render dismissible alert', function () {
    $result = Blade::render('<x-ui.alert :dismissible="true">Test Message</x-ui.alert>');

    expect($result)
        ->toContain('data-dismissible')
        ->toContain('Test Message');
});

test('it can render different alert types', function () {
    $success = Blade::render('<x-ui.alert type="success">Success</x-ui.alert>');

    expect($success)->toContain('bg-green-100');
});

test('it can merge additional classes', function () {
    $result = Blade::render('<x-ui.alert class="custom-class">Test</x-ui.alert>');

    expect($result)->toContain('custom-class');
});
