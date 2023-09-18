<ul {{ $attributes->except(['item-class', 'icons-class', 'description-class', 'actions-class']) }}>
    {{ $before ?? null }}
    @foreach ($blessings as $blessing)
        <x-blessing.item
            wire:key="blessing-{{ $blessing->id }}"
            :actions-class="$actionsClass ?? null"
            :icon-class="$iconClass ?? null"
            :description-class="$descriptionClass ?? null"
            :$blessing
            :class="$itemClass . ' relative'"
        />
    @endforeach
    {{ $after ?? null }}
</ul>
