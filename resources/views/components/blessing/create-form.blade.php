<form wire:submit="addBlessing" {{ $attributes }} x-init="$refs.description.focus()">
    <label class="w-full {{ $labelClass ?? null }}">
        <input
            type="text"
            x-ref="description"
            wire:model="description"
            placeholder="Ik ben dankbaar voor..."
            class="w-full rounded focus:outline-none !text-[16px] {{ $inputClass ?? null }}"
            x-on:focusout="$wire.addBlessing(); $wire.formActive = false"
            id="create-form-description"
        >
        <button type="submit">
            <svg width="32" height="32" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="21" cy="21" r="21" fill="#55AB21"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M19.893 10.4556C20.5439 9.84813 21.5991 9.84813 22.25 10.4556L30.5118 17.7778C31.1627 18.3853 31.1627 19.3702 30.5118 19.9777C29.861 20.5851 28.8057 20.5851 28.1548 19.9777L22.7382 15.311L22.7382 30.4444C22.7382 31.3036 21.992 32 21.0715 32C20.151 32 19.4048 31.3036 19.4048 30.4444L19.4048 15.311L13.8452 19.9777C13.1943 20.5851 12.139 20.5851 11.4882 19.9777C10.8373 19.3702 10.8373 18.3853 11.4882 17.7778L19.893 10.4556Z" fill="white"/>
            </svg>
        </button>
    </label>
</form>
