<li {{ $attributes }}
    x-data="{
        hammer: null,
        init() {
            const container = this.$refs.blessingItem;
            const btn = this.$refs.removeBlessing;
            const hammerInstance = new Hammer(container);

            const maxDragDistance = container.offsetWidth;

            hammerInstance.on('panleft', (e) => {
                let distance = e.distance > maxDragDistance ? maxDragDistance : e.distance;
                let percentage = (1 - distance / maxDragDistance) * 100;
                btn.style.transform = `translateX(${percentage}%)`;
            });

            hammerInstance.on('panright', (e) => {
                let distance = e.distance > maxDragDistance ? maxDragDistance : e.distance;
                let percentage = distance / maxDragDistance * 100;
                btn.style.transform = `translateX(${percentage}%)`;
            });

            hammerInstance.on('panend', (e) => {
                let snapThreshold = maxDragDistance * 0.5;
                if (e.distance > snapThreshold) {
                    btn.style.transform = e.offsetDirection === 4 ? 'translateX(100%)' : 'translateX(0)';
                } else {
                    btn.style.transform = e.offsetDirection === 4 ? 'translateX(0)' : 'translateX(100%)';
                }
            });

            container.addEventListener('click', function(e) {
                if (!btn.contains(e.target)) {
                    btn.style.transform = 'translateX(100%)';
                }
            });

            window.addEventListener('click', function(e) {
                if (!btn.contains(e.target)) {
                    btn.style.transform = 'translateX(100%)';
                }
            });
        },
    }"
    x-ref="blessingItem"
>
    <x-icons.face-smile class="w-4 h-4 relative shrink-0 text-primary-600 {{ $iconClass ?? null }}" />

    <div class="border-[#EEE] border-b flex justify-between w-full items-start w-full">
        <div class="{{ $descriptionClass ?? null }}">
            {{ $blessing->description }}
        </div>

        <div class="hidden md:block ml-2">
            <button
                type="button"
                class="transition transition-all opacity-0 group-hover:opacity-100 rounded-full w-6 h-6 hover:ring-2 hover:shadow-md active:bg-red-500 active:text-white ring-red-500 text-red-500"
                wire:click="remove({{ $blessing->id }})"
                wire:loading.attr="disabled"
            >
                &cross;
            </button>
        </div>
    </div>

    <div
        x-ref="removeBlessing"
        class="{{ $actionsClass ?? null }} absolute md:hidden inset-y-0 right-0 transform translate-x-full transition-transform duration-300 flex items-center">
        <button
            wire:click="edit({{ $blessing->id }})"
            x-on:click="document.getElementById('create-form-description').focus()"
            class="bg-[#72A3BF] text-white p-2"
        >
            Wijzig
        </button>
        <button wire:click="remove({{ $blessing->id }})" class="bg-[#E0422C] text-white p-2">
            Verwijder
        </button>
    </div>
</li>
