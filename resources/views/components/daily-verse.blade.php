@props(['day'])

<?php

use App\Models\Verse;

$verse = Verse::whereDay($day);

?>

<div {{ $attributes->class(['flex flex-col gap-2']) }}>
    <div class="font-default text-md leading-6 font-black">
        {{ $verse['text'] }}
    </div>
    <div class="opacity-75 text-xs text-small font-light">
        {{ $verse['verse'] }}
    </div>
</div>
