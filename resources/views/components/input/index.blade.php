@props([
    'type' => 'text',
    'name' => '',
    'id' => '',
    'label' => '',
    'required' => true,
    'size' => 'w-full',
    'inline' => 'no',
    'icon' => '',
    'iconPos' => 'start',
])

@php
    if ($type == "password") {
        $icon = "password";
        $iconPos = "end";
        $attributes['x-bind:type'] = "show ? 'text' : 'password'";
    }
@endphp

<div class="{{ ($inline=='no')?'input_wrapper':'input_inline_wrapper' }}">
    @if ($label != "")
        <label
            for="{{ ($id!='')?$id:$name }}"
            class="{{ (isset($attributes['class']) and Str::contains($attributes['class'], 'danger'))?'label label_danger':'label' }}">
            {{ $label }}
        </label>
    @endif

    <div class="{{ $size }} {{ ($icon!='')?'input_icon_wrapper':'' }}" {!! ($type=='password')?'x-data="{show:false}"':'' !!}>
        @if (in_array($type, ['text', 'email', 'number', 'password', 'date', 'time']))
            <input
                type="{{ $type }}"
                id="{{ ($id != '')?$id:$name }}"
                name="{{ $name }}"
                {{ $attributes->merge([
                    'class'=>($icon=='')?'w-full h-full input':(($iconPos=='start')?'w-full h-full input_icon':'w-full h-full input_icon_end')
                ]) }}
                {{ ($required)?'required':'' }}/>
        @endif

        @if ($icon != "")
            <div class="{{ ($type=='password')?'':'pointer-events-none' }} {{ ($iconPos=='start')?'icon_input':'icon_input_end' }}">
                @if ($type == "password")
                    <span x-on:click="show = !show" type="button" class="p-1 cursor-pointer focus:outline-none rounded-xl transition_default hover:bg-general-200">
                        <x-icon.eye x-show="!show"/>
                        <x-icon.eye-slash x-show="show"/>
                    </span>
                @else
                    {{ $icon }}
                @endif
            </div>
        @endif
    </div>

    @error($name)
        <p class="text-xs italic font-light text-danger-800">{{ $message }}</p>
    @enderror
</div>
