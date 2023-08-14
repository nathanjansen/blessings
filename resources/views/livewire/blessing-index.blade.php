<div class="w-full flex flex-col gap-6 bg-white rounded-lg p-4 pb-8" x-init="$refs.description.focus()">

    <x-blessing.day-switcher class="flex gap-2 w-full justify-between items-center px-6" />

    <hr class="-mt-6 mx-4"/>

    <div class="flex justify-between px-6">
        <x-daily-verse :day="$carbonDate" />

        <x-user-webpush-subscribe-button
            class="border p-2 border-purple-500 rounded text-purple-500 hover:shadow-md hover:bg-purple-500 hover:text-white transition transition-all active:shadow-none active:bg-purple-600 active:text-white"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
            </svg>
        </x-user-webpush-subscribe-button>
    </div>

    <hr class="mx-4" />

    <x-blessing.list
        :blessings="$blessings"
        class="flex flex-col gap-1 px-6"
        item-class="flex justify-between items-start group transition transition-all"
    >
        <x-slot:before>
            <li class="flex gap-1 items-center">
                <x-icons.face-smile class="w-4 h-4 shrink-0 text-green-500"/>

                <x-blessing.create-form class="w-full flex gap-0"/>
            </li>
        </x-slot:before>
    </x-blessing.list>

    <hr class="mx-4">

    <div class="flex justify-between px-6 items-center">
        <x-blessing.count
            :count="$blessingCount"
            class="text-gray-400 text-sm"
        />

        <small class="text-gray-400 text-xs">{{ config('app.version') }}</small>
    </div>

</div>
