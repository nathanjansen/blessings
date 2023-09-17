<div
    x-data="{ value: $wire.get('{{ $attributes->wire('model')->value() }}') || false }"
    class="flex items-center w-full justify-between"
    x-id="['toggle-label']"
    {{ $attributes }}
>
    <!-- Label -->
    <label
        @click="$refs.toggle.click(); $refs.toggle.focus()"
        :id="$id('toggle-label')"
        class="text-gray-900 font-light"
    >
        {{ $label }}
    </label>

    <!-- Button -->
    <button
        x-ref="toggle"
        @click="
            value = ! value;
            $nextTick(() => $wire.set('{{ $attributes->wire('model')->value() }}', value));
        "
        type="button"
        role="switch"
        :aria-checked="value"
        :aria-labelledby="$id('toggle-label')"
        :class="value ? 'bg-primary-500' : 'bg-slate-300'"
        class="relative ml-4 inline-flex w-14 rounded-full py-1 transition"
    >
        <span
            :class="value ? 'translate-x-7' : 'translate-x-1'"
            class="bg-white h-6 w-6 rounded-full transition shadow-md"
            aria-hidden="true"
        ></span>
    </button>
</div>
