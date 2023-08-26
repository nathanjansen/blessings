<div {{ $attributes }}>
    <button wire:click="previousDay" class="p-4 -ml-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
            <path d="M7.41 1.41L6 0L0 6L6 12L7.41 10.59L2.83 6L7.41 1.41Z" fill="black"/>
        </svg>
    </button>

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
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="8" height="12" viewBox="0 0 8 12" fill="none">
            <path d="M1.41 0L0 1.41L4.58 6L0 10.59L1.41 12L7.41 6L1.41 0Z" fill="black"/>
        </svg>
    </button>
</div>
