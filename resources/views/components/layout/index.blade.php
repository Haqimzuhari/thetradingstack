@props([
    'title' => '',
    'styles'=>'',
    'scripts'=>''
])

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{!! (isset($title) and $title!="")?$title." &mdash; ".env('APP_NAME'):env('APP_NAME') !!}</title>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        {{-- Tailwind --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        {{-- Custom Styles --}}
        {!! $styles !!}

        {{-- Styles --}}
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

        {{-- Alpine --}}
        <script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
    </head>
    <body class="body_theme">
        {{ $slot }}

        {{-- Toast --}}
        <x-toast/>

        {{-- Custom Scripts --}}
        {!! $scripts !!}

        {{-- Scripts --}}
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
