<form wire:submit="addBlessing" {{ $attributes }}>
    <label class="w-full">
        <input
            type="text"
            x-ref="description"
            wire:model="description"
            placeholder="Ik ben dankbaar voor..."
            class="w-full focus:outline-none focus:pl-1 animate-pulse"
            x-on:focusout="$wire.addBlessing()"
            :class="{ 'pl-1' : $refs.description.value.length === 0 }"
        >
    </label>
    <button type="submit" class="border px-4 hidden">&plus;</button>
</form>
