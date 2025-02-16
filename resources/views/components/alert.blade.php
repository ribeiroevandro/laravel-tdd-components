<div {{ $attributes->merge(['class' => "{$bgColor} {$textColor} p-4 rounded-lg flex gap-2 items-start"]) }}>
    <div>
        {{ $slot }}
    </div>
</div>
