<?php

use App\View\Components\Ui\Alert;
use App\View\Components\Enums\AlertType;
use Illuminate\View\ViewException;

test('it has default values', function () {
    $alert = new Alert();

    expect($alert)
        ->alertType->toBe(AlertType::INFO)
        ->dismissible->toBeFalse();
});

test('it returns correct type classes', function () {
    $alert = new Alert(AlertType::SUCCESS->value);

    expect($alert->typeClasses())->toBe('bg-green-100 text-green-800');
});

test('it throws exception for invalid type', function () {
    expect(fn () => new Alert('invalid'))
        ->toThrow(ViewException::class)
        ->toThrow('Alert type must be one of: success, error, warning, info');
});

test('it can merge additional classes', function () {
    $alert = new Alert(AlertType::SUCCESS->value);

    expect($alert->typeClasses('rounded-lg'))
        ->toBe('bg-green-100 text-green-800 rounded-lg');
});
