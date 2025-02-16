<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\ViewException;

uses()->beforeEach(function () {
    view()->share('errors', new ViewErrorBag);
})->group('components');

test('it can render input', function () {
    $result = Blade::render(
        '<x-form.input
            name="email"
            type="email"
            label="Email Address"
            placeholder="Enter your email"
            required
        />'
    );

    expect($result)
        ->toContain('name="email"')
        ->toContain('type="email"')
        ->toContain('placeholder="Enter your email"')
        ->toContain('required')
        ->toContain('Email Address');
});

test('it can render input without optional attributes', function () {
    $result = Blade::render('<x-form.input name="username" />');

    expect($result)
        ->toContain('name="username"')
        ->toContain('type="text"')
        ->not->toContain('placeholder')
        ->not->toContain('required');
});

test('it shows error message when validation fails', function () {
    $errors = new ViewErrorBag;
    $errors->put('default', new \Illuminate\Support\MessageBag([
        'email' => ['The email field is required.']
    ]));

    view()->share('errors', $errors);

    $result = Blade::render('<x-form.input name="email" type="email" />');

    expect($result)
        ->toContain('The email field is required.')
        ->toContain('error-message')
        ->toContain('input-error');
});

test('it can render input with value', function () {
    $result = Blade::render(
        '<x-form.input name="email" type="email" value="test@example.com" />'
    );

    expect($result)
        ->toContain('value="test@example.com"');
});

test('it validates input type', function () {
    expect(fn () => Blade::render('<x-form.input name="test" type="invalid" />'))
        ->toThrow(ViewException::class, 'Invalid input type');
});

test('it can render disabled input', function () {
    $result = Blade::render('<x-form.input name="email" disabled />');

    expect($result)->toContain('disabled');
});
