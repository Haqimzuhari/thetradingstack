<span x-data="{id:'{{ $target }}'}" x-on:click="body_scroll_lock(true), $dispatch('modal-overlay',{id})">
    {{ $slot }}
</span>
