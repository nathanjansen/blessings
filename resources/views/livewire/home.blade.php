<div class="flex flex-col flex-grow">
    <x-slot:head>
        <div class="max-w-2xl mx-auto">
            <x-daily-verse class="flex gap-4 justify-between" :day="$carbonDate" />
        </div>
    </x-slot:head>

    <div
        class="flex flex-grow flex-col justify-end h-full w-full md:py-12 relative md:max-w-4xl mx-auto"
        x-on:blessing-created.window="$nextTick(() => scrollIntoView())"
        x-data="{
            init() {
                this.scrollIntoView();
            },

            scrollIntoView() {
                const element = this.$refs.blessinglist;
                element.scrollTo({
                    top: element.firstElementChild.clientHeight
                });
            },
        }"
    >
        <div x-ref="blessinglist" class="overflow-y-auto">
            <x-blessing.list
                wire:key="{{ $carbonDate }}"
                :blessings="$blessings"
                class="flex flex-1 flex-col pt-4 overflow-hidden"
                item-class="flex text-sm gap-3 pl-6 py-1 justify-between items-center group transition transition-all w-full"
                description-class="pb-2"
                icon-class="mb-2"
                actions-class="mb-2"
            />
        </div>

        @if (! count($blessings))
            <div class="opacity-25 uppercase font-bold p-12 text-center flex flex-col items-center gap-6">
                Je hebt deze dag nog geen Blessings, noteer ze hieronder

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5L12 21m0 0l-7.5-7.5M12 21V3" />
                </svg>
            </div>
        @endif

        <x-blessing.create-form
            class="w-full flex gap-0 z-10 w-full px-6 py-4 bg-gradient-to-t from-[#F3F3F3] via-[#F3F3F3]"
            label-class="bg-white rounded-2xl overflow-hidden border border-[#AEAEAE] flex gap-2 pr-1"
            input-class="py-2 px-4 placeholder:italic placeholder:font-light text-sm"
        />

        <div class="mb-4 w-full" x-transition>
            <x-blessing.day-switcher class="flex gap-2 w-full justify-between items-center p-6 mx-auto md:max-w-xs h-20  w-full" />
        </div>
    </div>


</div>
