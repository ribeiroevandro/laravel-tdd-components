<div {{ $attributes->merge(['class' => "p-4 rounded-lg {$typeClasses()}"]) }}>
    {{ $slot }}
</div>
