<?php \Laravel\Folio\name('statistics'); ?>

@php

$blessingCount = \App\Models\Blessing::count();

@endphp

<x-layouts.app class="max-w-4xl mx-auto">

    <h1 class="text-5xl font-bold mb-4">Statistieken</h1>

    <x-blessing.count
        :count="$blessingCount"
        class="text-black font-bold text-lg"
    />

</x-layouts.app>

