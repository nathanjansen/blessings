<x-layouts.page
    x-init="$refs.description.focus()"
>
    <x-slot:head>
        <x-daily-verse class="flex gap-4 justify-between" :day="$carbonDate" />
    </x-slot:head>

    <x-slot:foot>
        <x-blessing.day-switcher class="flex gap-2 w-full justify-between items-center p-6 max-w-xs mx-auto" />
    </x-slot:foot>


    <div class="flex flex-col justify-end h-full gap-6 md:grid grid-cols-2 grid-row gap-6 md:divide-x">

        <x-blessing.list
            :blessings="$blessings"
            class="flex flex-col"
            item-class="flex text-sm gap-3 justify-between items-center group transition transition-all w-full"
        />

        <x-blessing.create-form
            class="w-full flex gap-0 py-3"
            input-class="py-2 px-4 placeholder:italic placeholder:font-light text-sm"
        />
    </div>

</x-layouts.page>
