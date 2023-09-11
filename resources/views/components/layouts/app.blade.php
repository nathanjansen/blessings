@props([
    'title' => config('app.name'),
    'bodyClass' => null,
    'header' => null,
    'footer' => null,
    'meta' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title }}</title>

        <link rel="manifest" href="manifest.json">
        <link rel="apple-touch-icon" sizes="512x512" href="/apple/icons/logo-512x512.png">
        <link rel="icon" type="image/png" href="/icons/logo-512x512.png" />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {!! $meta !!}

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @vite('resources/css/app.css')
    </head>
    <body {{ $attributes->class([
        $bodyClass,
        'bg-white' => ! $bodyClass,
    ]) }}>
        <div class="h-screen flex flex-col">
            <x-layouts.navigation />

            <div class="flex-1 bg-white relative">
                {{ $slot }}
            </div>

        </div>

        @vite('resources/js/app.js')

    </body>
</html>
