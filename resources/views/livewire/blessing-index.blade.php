<div class="w-full flex flex-col gap-6 bg-white rounded-lg p-4 pb-8" x-init="$refs.description.focus()">

    <x-blessing.day-switcher class="flex gap-2 w-full justify-between items-center px-6 max-w-xs mx-auto" />

    <div class="flex flex-col gap-6 md:grid grid-cols-2 grid-row gap-6 md:divide-x">

        <x-blessing.list
            :blessings="$blessings"
            class="flex flex-col px-6"
            item-class="flex gap-3 justify-between items-center group transition transition-all w-full"
        >
            <x-slot:before>
                <li class="flex gap-3 items-center">
                    <x-icons.face-smile class="w-4 h-4 shrink-0 text-green-500"/>

                    <x-blessing.create-form
                        class="w-full flex gap-0 py-3 border-b"
                        input-class="placeholder:pl-1"
                    />
                </li>
            </x-slot:before>
        </x-blessing.list>

        <div class="flex justify-between px-6">
            <x-daily-verse :day="$carbonDate" />

            <div>
                <x-convey::subscribe-button
                    class="border p-2 border-black rounded text-black hover:shadow-md hover:bg-black hover:text-white transition transition-all active:shadow-none active:bg-purple-600 active:text-white"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </x-convey::subscribe-button>
            </div>
        </div>
    </div>

    <div class="flex justify-between px-6 items-center">
        <x-blessing.count
            :count="$blessingCount"
            class="text-gray-400 text-sm"
        />

        <small class="text-gray-400 text-xs">{{ config('app.version') }}</small>
    </div>

</div>
