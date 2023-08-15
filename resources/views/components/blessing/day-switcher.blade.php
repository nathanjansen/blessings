<div {{ $attributes }}>
    <button wire:click="previousDay" class="p-4 -ml-3">&lt;</button>

    <div class="text-center font-black">
        {{ $beforeDay ?? null }}
        @if ($this->carbonDate()->isToday())
            <span>Vandaag</span>
        @else
            {{ $this->carbonDate()->format('d') }}
            {{ str($this->carbonDate()->isoFormat('MMM YYYY'))->limit(3, false) }}
        @endif
        {{ $afterDay ?? null }}
    </div>

    <button
        wire:click="nextDay"
        @if (! $this->hasNextDay())
            disabled
        @endif
        @class([
            'p-4 -ml-3',
            'opacity-10 cursor-not-allowed' => ! $this->hasNextDay(),
        ])
    >&gt;</button>
</div>
