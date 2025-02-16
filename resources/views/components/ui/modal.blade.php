<div {{ $attributes->merge(['class' => 'relative']) }} x-cloak>
    <div class='fixed inset-0 bg-black opacity-25 dark:opacity-60 z-[48]'></div>
    <div
        class='bg-white dark:bg-zinc-900 shadow-md {{ $maxWidthClass() }} h-[75vh] top-14 mx-auto rounded-3xl fixed inset-0
        z-[49] border border-gray-200 dark:border-zinc-700 overflow-hidden'
    >
        <div class="bg-white scrollable-content overflow-y-auto max-h-full">
            @if($title)
                <div class="p-4 border-b border-gray-200 dark:border-zinc-700">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ $title }}
                    </h3>
                </div>
            @endif
            <div class="p-10">
                {{ $slot }}
            </div>
        </div>
    </div>
    @if($closeable)
        <div class="bg-transparent dark:bg-transparent fixed top-[85vh] right-0 left-0 z-[49] flex items-center justify-center">
            <div class="bg-white dark:bg-zinc-900 p-1 rounded-full hover:bg-black/10 dark:hover:bg-white/20" x-transition>
                <button @click='showModal = false' class="rounded-full border-2 border-secondary dark:border-orange-50 p-4">
                    x
                </button>
            </div>
        </div>
    @endif
</div>
