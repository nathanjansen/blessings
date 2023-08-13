<div class="w-full flex flex-col gap-6" x-init="$refs.description.focus()">

    <x-blessing.day-switcher class="flex gap-2 w-full justify-between items-center px-6" />

    <hr class="-mt-6"/>

    <x-daily-verse class="px-6" :day="$carbonDate" />

    <hr/>

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

    <hr>

    <div class="flex justify-between px-6 items-center">
        <x-blessing.count
            :count="$blessingCount"
            class="text-gray-400 text-sm"
        />

        <small class="text-gray-400 text-xs">{{ config('nativephp.version') }}</small>
    </div>

</div>
