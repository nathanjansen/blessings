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

        <div class="flex gap-4 justify-between px-6">
            <x-daily-verse :day="$carbonDate" />

{{--            <div>--}}
{{--                <x-convey::subscribe-button--}}
{{--                    class="border p-2 border-black rounded text-black hover:shadow-md hover:bg-black hover:text-white transition transition-all active:shadow-none active:bg-purple-600 active:text-white"--}}
{{--                >--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">--}}
{{--                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />--}}
{{--                    </svg>--}}
{{--                </x-convey::subscribe-button>--}}
{{--            </div>--}}
        </div>
    </div>

    <x-slot:footer class="flex justify-between h-10 px-6 items-center">
        <x-blessing.count
            :count="$blessingCount"
            class="text-gray-400 text-sm"
        />

        <small class="text-gray-400 text-xs">{{ config('app.version') }}</small>

        <a wire:navigate href="/profile">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                <path d="M2.88799 9.49177L1.05684 8.43478C0.847708 8.31408 0.750641 8.06448 0.822269 7.83387C1.29793 6.30237 2.11004 4.91878 3.17219 3.76962C3.25167 3.68358 3.35806 3.62712 3.47387 3.60952C3.58969 3.59192 3.70804 3.61422 3.8095 3.67277L5.63928 4.72959C6.40915 4.06995 7.29425 3.5582 8.25002 3.22009V1.10681C8.25002 0.989597 8.28992 0.875881 8.36315 0.784367C8.43638 0.692854 8.53858 0.628994 8.65294 0.603298C10.155 0.265993 11.7681 0.248549 13.3459 0.602997C13.5818 0.655977 13.75 0.864935 13.75 1.10672V3.22009C14.7058 3.55818 15.5909 4.06993 16.3607 4.72959L18.1905 3.67277C18.292 3.61422 18.4103 3.59192 18.5261 3.60952C18.6419 3.62712 18.7483 3.68358 18.8278 3.76962C19.8899 4.91878 20.7021 6.30237 21.1777 7.83387C21.2494 8.06444 21.1523 8.31404 20.9432 8.43478L19.112 9.49177C19.2959 10.4888 19.2959 11.5111 19.112 12.5081L20.9431 13.5651C21.1522 13.6858 21.2493 13.9354 21.1777 14.166C20.702 15.6975 19.8899 17.0811 18.8278 18.2303C18.7483 18.3163 18.6419 18.3728 18.5261 18.3904C18.4103 18.408 18.2919 18.3857 18.1905 18.3271L16.3607 17.2703C15.5908 17.93 14.7057 18.4417 13.7499 18.7798V20.8931C13.7499 21.0103 13.71 21.1241 13.6368 21.2156C13.5636 21.3071 13.4614 21.371 13.347 21.3966C11.845 21.734 10.2318 21.7514 8.65401 21.397C8.41811 21.344 8.24998 21.135 8.24998 20.8932V18.7799C7.29419 18.4418 6.40909 17.93 5.63924 17.2704L3.80946 18.3272C3.708 18.3857 3.58964 18.408 3.47383 18.3904C3.35802 18.3728 3.25163 18.3164 3.17215 18.2303C2.11004 17.0812 1.29789 15.6976 0.822227 14.1661C0.750597 13.9355 0.847664 13.6859 1.05679 13.5652L2.88799 12.5082C2.70407 11.5111 2.70407 10.4888 2.88799 9.49177ZM7.56248 11C7.56248 12.8954 9.10454 14.4375 11 14.4375C12.8954 14.4375 14.4375 12.8954 14.4375 11C14.4375 9.10454 12.8954 7.56247 11 7.56247C9.10454 7.56247 7.56248 9.10454 7.56248 11Z" fill="black"/>
            </svg>
        </a>
    </x-slot:footer>

</div>
