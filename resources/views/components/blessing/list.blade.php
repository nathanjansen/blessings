<ul {{ $attributes }}>
    {{ $before ?? null }}
    @foreach ($blessings as $blessing)
        <x-blessing.item
            wire:key="{{ $blessing->id }}"
            :$blessing
            :class="$itemClass"
        />
    @endforeach
    {{ $after ?? null }}
</ul>
