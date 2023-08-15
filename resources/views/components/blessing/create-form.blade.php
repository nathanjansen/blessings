<form wire:submit="addBlessing" {{ $attributes }}>
    <label class="w-full">
        <input
            type="text"
            x-ref="description"
            wire:model="description"
            placeholder="Ik ben dankbaar voor..."
            class="w-full focus:outline-none animate-pulse {{ $inputClass ?? null }}"
            x-on:focusout="$wire.addBlessing()"
        >
    </label>
    <button type="submit" class="border px-4 hidden">&plus;</button>
</form>
