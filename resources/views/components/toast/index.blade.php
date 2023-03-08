@php
    $colors = [
        'success' => 'text-green-900',
        'info' => 'text-blue-900',
        'warning' => 'text-orange-900',
        'danger' => 'text-red-900',
    ];

    $icons = [
        'success' => 'icon.check-circle',
        'info' => 'icon.information-circle',
        'warning' => 'icon.exclamation-circle',
        'danger' => 'icon.no-symbol',
    ];
@endphp

@if (session('toast'))

    @php
        $toast = session('toast');
        $type = $toast[0] ?? 'success';
        $message = $toast[1] ?? 'Operation success';
        $details = $toast[2] ?? '';
    @endphp

    <div class="fixed w-full p-4 space-y-2 text-sm bg-white border shadow-xl top-2 right-3 sm:max-w-sm rounded-xl border-neutral-50" x-data="{toast: true}" x-show="toast">
        <div class="flex items-center justify-between">
            <div class="flex items-center w-full space-x-2">
                <x-dynamic-component :component="$icons[$type]" class="w-5 h-5 {{ $colors[$type] }}" stroke="stroke"/>
                <p class="font-bold {{ $colors[$type] }}">{{ $message }}</p>
            </div>

            <button type="button" class="flex-none p-1 rounded flex_center transition_default hover:bg-neutral-100" x-on:click="toast = false">
                <x-icon.x-mark size="w-4 h-4"/>
            </button>
        </div>

        @if ($details and $details != "")
            <p class="text-xs">{{ $details }}</p>
        @endif
    </div>
@endif
