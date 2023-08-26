<x-layouts.app>
    <x-slot name="header" class="max-w-3xl w-full mx-auto px-4 sm:px-0 flex gap-2 justify-between items-center">
        <a wire:navigate href="/" class="inline-flex gap-2 items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                <path d="M12 5.25H2.8725L7.065 1.0575L6 0L0 6L6 12L7.0575 10.9425L2.8725 6.75H12V5.25Z" fill="black"/>
            </svg>
            Terug
        </a>

        @include('profile.logout')

{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Profile') }}--}}
{{--        </h2>--}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto space-y-6">
            <div class="p-4 sm:p-0 bg-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-0 bg-white">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-0 bg-white">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
