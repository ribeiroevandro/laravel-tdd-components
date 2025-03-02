<?php

use App\View\Components\Ui\Alert;
use App\View\Components\Enums\AlertType;
use Illuminate\View\ViewException;

test('it has default values', function () {
    $alert = new Alert();

    expect($alert->alertType)->toBe(AlertType::INFO)
        ->and($alert->dismissible)->toBeFalse();
});

test('it returns correct type classes', function () {
    $alert = new Alert(AlertType::SUCCESS->value);

    expect($alert->typeClasses())->toBe('bg-green-100 text-green-800');
});

test('it throws exception for invalid type', function () {
    expect(fn () => new Alert('invalid'))
        ->toThrow(
            ViewException::class,
            'Alert type must be one of: success, error, warning, info'
        );
});
