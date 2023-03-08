@props([
    'size' => '2xl',
])

<div class="flex items-center space-x-2">
    <x-icon.rocket-launch stroke="{{ (in_array($size, ['3xl', '2xl']))?'stroke-2':((in_array($size, ['xl']))?'stroke':'stroke-1') }}" size="{{ (in_array($size, ['3xl', '2xl']))?'h-6 w-6':((in_array($size, ['xl']))?'h-5 w-5':'h-4 w-4') }}"/>
    <p class="text-{{ $size }} {{ (in_array($size, ['3xl', '2xl']))?'font-bold':((in_array($size, ['xl']))?'font-semibold':'font-light') }}">{{ config('app.name') }}</p>
</div>
