@props([
    'title' => '',
    'styles'=>'',
    'scripts'=>''
])

<x-layout title="{!! $title ?? '' !!}">
    <x-slot name="styles">{!! $styles !!}</x-slot>
    <x-slot name="scripts">{!! $scripts !!}</x-slot>
    <x-nav.sidebar/>
    <main class="ml-56 p-8">
        {{ $slot }}
    </main>
</x-layout>
