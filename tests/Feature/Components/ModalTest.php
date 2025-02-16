<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\View\ViewException;

test('it can render modal', function () {
    $result = Blade::render(
        '<x-ui.modal>Test Content</x-ui.modal>'
    );

    expect($result)
        ->toContain('Test Content')
        ->toContain('max-w-md');
});

test('it can render modal with title', function () {
    $result = Blade::render(
        '<x-ui.modal title="Test Title">Test Content</x-ui.modal>'
    );

    expect($result)
        ->toContain('Test Title')
        ->toContain('Test Content');
});

test('it can render modal without close button', function () {
    $result = Blade::render(
        '<x-ui.modal :closeable="false">Test Content</x-ui.modal>'
    );

    expect($result)->not->toContain('showModal = false');
});

test('it can render modal with custom width', function () {
    $result = Blade::render(
        '<x-ui.modal max-width="2xl">Test Content</x-ui.modal>'
    );

    expect($result)->toContain('max-w-2xl');
});

test('it can merge additional classes', function () {
    $result = Blade::render(
        '<x-ui.modal class="custom-class">Test Content</x-ui.modal>'
    );

    expect($result)->toContain('custom-class');
});
