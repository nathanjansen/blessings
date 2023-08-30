<?php \Laravel\Folio\name('statistics'); ?>

@php

$blessingCount = \App\Models\Blessing::count();

@endphp

<x-layouts.app class="max-w-4xl mx-auto">

    <div class="w-full flex flex-col gap-6 bg-white rounded-lg p-4 pb-8">

        <h1 class="text-5xl font-bold mb-4">Statistieken</h1>

        <x-blessing.count
            :count="$blessingCount"
            class="text-black font-bold text-lg"
        />

    </div>

</x-layouts.app>

