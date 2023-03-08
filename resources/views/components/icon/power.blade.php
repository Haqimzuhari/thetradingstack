@props([
    'size' => 'w-5 h-5',
    'stroke' => 'stroke-1',
    'class' => '',
])

<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="{{ $size }} {{ $stroke }} {{ $class }}" {{ $attributes }}>
    <path stroke-linecap="round" stroke-linejoin="round" d="M5.636 5.636a9 9 0 1012.728 0M12 3v9" />
</svg>