@props(['day'])

<?php

use App\Models\Verse;

$startDate = now()->parse('2023-01-01');
$dateDiff = $startDate->diffInDays($day);

$verseId = $dateDiff % 10;

$verse = Verse::find($verseId + 1);

?>

<div {{ $attributes->class(['flex flex-col gap-2']) }}>
    <div class="font-default text-sm leading-6 font-bold">
        {{ $verse['text'] }}
    </div>
    <div class="text-[#888] text-sm text-small font-normal">
        {{ $verse['verse'] }}
    </div>
</div>
