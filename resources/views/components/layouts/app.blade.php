@props([
    'title' => config('app.name'),
    'bodyClass' => null,
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
        'bg-stone-100' => ! $bodyClass,
    ])>
        {{ $slot }}
    </body>
</html>
