@props([
    'name',
    'type' => 'text',
    'label' => null,
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'disabled' => false
])

@php
    $validTypes = ['text', 'email', 'password', 'number', 'tel', 'url', 'search', 'date'];

    if (isset($type) && !in_array($type, $validTypes)) {
        throw new \Illuminate\View\ViewException('Invalid input type');
    }
@endphp

<div class="form-group">
    @if($label)
        <label for="{{ $name }}" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">
            {{ $label }}
        </label>
    @endif

    <input
        type="{{ $type }}"
        name="{{ $name }}"
        id="{{ $name }}"
        value="{{ old($name, $value) }}"
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($required) required @endif
        @if($disabled) disabled @endif
        class="form-control @error($name) input-error @enderror"
    />

    @error($name)
        <div class="error-message">
            {{ $message }}
        </div>
    @enderror
</div>
