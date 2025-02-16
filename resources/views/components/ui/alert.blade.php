<div {{ $attributes->merge(['class' => "p-4 {$typeClasses('rounded-lg')}"]) }}
    @if($dismissible) data-dismissible @endif>
    {{ $slot }}
</div>
