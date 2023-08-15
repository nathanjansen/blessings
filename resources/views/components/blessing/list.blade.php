<ul {{ $attributes }}>
    {{ $before ?? null }}
    @foreach ($blessings as $blessing)
        <x-blessing.item
            wire:key="{{ $blessing->id }}"
            :icon-class="$iconClass ?? null"
            :description-class="$descriptionClass ?? null"
            :$blessing
            :class="$itemClass"
        />
    @endforeach
    {{ $after ?? null }}
</ul>
