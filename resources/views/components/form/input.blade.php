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
        {{ $attributes->class(['form-control', 'input-error' => $errors->has($name)]) }}
    />

    @error($name)
        <div class="text-red-800 font-bold text-xs">
            {{ $message }}
        </div>
    @enderror
</div>
