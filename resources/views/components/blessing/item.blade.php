<li {{ $attributes }}>
    <x-icons.face-smile class="w-4 h-4 shrink-0 text-green-500 mt-1 {{ $iconClass ?? null }}" />

    <div class="border-[#EEE] border-b flex justify-between w-full gap-2 items-start w-full py-3">
        <div class="{{ $descriptionClass ?? null }}">
            {{ $blessing->description }}
        </div>

        <div class="ml-2">
            <button
                type="button"
                class="transition transition-all opacity-0 group-hover:opacity-100 rounded-full w-6 h-6 hover:ring-2 hover:shadow-md active:bg-red-500 active:text-white ring-red-500 text-red-500"
                wire:click="remove({{ $blessing->id }})"
            >
                &cross;
            </button>
        </div>
    </div>
</li>
