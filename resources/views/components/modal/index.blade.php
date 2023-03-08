@props([
    'id' => 'null',
    'size' => 'sm:max-w-md',
    'title' => 'null',
])

<div
    class="fixed inset-0 z-50 flex flex-col items-center justify-start px-4 pt-4 pb-4 overflow-y-auto modal backdrop-blur-md bg-black/10 sm:pt-20"
    x-data="{modal:false}"
    x-show="modal"
    x-on:modal-overlay.window="if ($event.detail.id == '{{ $id }}') modal=true"
    x-on:close-modal-overlay.window="if ($event.detail.id == '{{ $id }}') modal=false"
    x-transition:enter="transition ease-out duration-500"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-500"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    x-cloak>
	<div
        class="w-full transition-all {{ $size }}"
        x-show="modal"
        x-transition:enter="transition ease-out duration-400"
        x-transition:enter-start="opacity-0 -translate-y-4 sm:translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-400"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4 sm:translate-y-4"
        x-on:click.away="body_scroll_lock(false), modal=false"
        x-cloak>
		<div class="p-6 space-y-6 bg-white shadow-xl rounded-xl">
            @if ($title != 'null')
                <div class="flex items-center">
                    <div class="w-full"><p class="text-xs font-bold">{{ $title }}</p></div>
                    <div class="flex items-center justify-end flex-none w-6">
                        <button type="button" class="p-1 rounded transition_default hover:bg-neutral-100" x-on:click="body_scroll_lock(false), modal=false">
                            <x-icon.x-mark size="w-4 h-4"/>
                        </button>
                    </div>
                </div>
            @endif
			{{ $slot }}
		</div>
	</div>
</div>
