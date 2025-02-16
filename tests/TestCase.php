<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\View;

abstract class TestCase extends BaseTestCase
{
    protected function blade(string $template, $data = []): string
    {
        return trim((string) View::make($template, $data));
    }

    protected function renderComponent(string $template, array $data = []): string
    {
        return trim((string) View::make('components.' . $template, $data));
    }
}
