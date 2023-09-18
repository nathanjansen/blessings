@props(['day'])

<?php

use App\Models\Verse;

$verse = Verse::whereDay($day);

?>

<div {{ $attributes->class(['flex flex-col gap-2']) }}>
    <div class="font-default text-lg leading-6 font-black">
        {{ $verse['text'] }}
    </div>
    <div class="text-[#C7EFAD] text-xs text-small font-light">
        {{ $verse['verse'] }}
    </div>
</div>
