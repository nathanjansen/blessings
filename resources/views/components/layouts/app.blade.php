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
        <link rel="apple-touch-icon" type="image/png" sizes="512x512" href="/icons/logo-512x512.png">
        <link rel="icon" type="image/png" href="/icons/logo-512x512.png" />

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {!! $meta !!}

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body @class([
        $bodyClass,
        'bg-white' => ! $bodyClass,
    ])>
        <div class="h-screen flex flex-col">

            @if ($header ?? null)
            <header {{ $header->attributes?->class('flex h-10 bg-white max-w-3xl') }}>
                {!! $header !!}
            </header>
            @endif

            <div class="flex-1 bg-white overflow-auto relative">
                <div class="pb-20">
                    {{ $slot }}
                </div>

{{--                <div class="h-20 bg-gradient-to-t from-white w-full fixed bottom-10 left-0"></div>--}}
            </div>

            @if ($footer ?? null)
            <footer {{ $footer->attributes->class(['max-w-4xl px-11 w-full mx-auto']) }}>
                {!! $footer !!}
            </footer>
            @endif
        </div>

    </body>
</html>
