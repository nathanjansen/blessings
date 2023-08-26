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
        <title>{{ $title }}</title>

        <link rel="manifest" href="manifest.json">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {!! $meta !!}

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body @class([
        $bodyClass,
        'bg-white md:bg-stone-100' => ! $bodyClass,
    ])>
        <div class="h-screen flex flex-col">

            @if ($header ?? null)
            <header class="flex h-10 bg-white">
                {!! $header !!}
            </header>
            @endif

            <div class="flex-1 bg-white md:bg-stone-100 overflow-auto relative">
                <div class="pb-20">
                    {{ $slot }}
                </div>

                <div class="h-20 bg-gradient-to-t from-white w-full fixed bottom-10 left-0"></div>
            </div>

            @if ($footer ?? null)
            <footer {{ $footer->attributes }}>
                {!! $footer !!}
            </footer>
            @endif
        </div>

    </body>
</html>
