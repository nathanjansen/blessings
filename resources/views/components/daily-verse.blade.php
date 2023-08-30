@props(['day'])

<?php

use App\Models\Verse;

$verse = Verse::whereDay($day);

ray($verse, $day);

?>

<div {{ $attributes->class(['flex flex-col gap-2']) }}>
    <div class="font-default text-sm leading-6 font-bold">
        {{ $verse['text'] }}
    </div>
    <div class="text-[#888] text-sm text-small font-normal">
        {{ $verse['verse'] }}
    </div>
</div>
