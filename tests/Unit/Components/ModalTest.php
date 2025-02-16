<?php

use App\View\Components\UI\Modal;

test('it returns correct max width class', function () {
    expect((new Modal(maxWidth: 'sm'))->maxWidthClass())->toBe('max-w-sm')
        ->and((new Modal(maxWidth: 'lg'))->maxWidthClass())->toBe('max-w-lg')
        ->and((new Modal())->maxWidthClass())->toBe('max-w-md');
});

test('it has default values', function () {
    $modal = new Modal();

    expect($modal->title)->toBeNull()
        ->and($modal->closeable)->toBeTrue()
        ->and($modal->maxWidth)->toBe('md');
});
