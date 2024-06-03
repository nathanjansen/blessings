<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="mb-5">
        <div class="flex items-center">
            <label for="name" class="w-[22px] inline-block text-right mr-4 text-gray-500 text-gray-500">
                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 0C4.9225 0 0 4.9225 0 11C0 17.0775 4.9225 22 11 22C17.0775 22 22 17.0775 22 11C22 4.9225 17.0775 0 11 0ZM11 3.78125C12.705 3.78125 14.0938 5.17 14.0938 6.875C14.0938 8.58 12.705 9.96875 11 9.96875C9.295 9.96875 7.90625 8.58 7.90625 6.875C7.90625 5.17 9.295 3.78125 11 3.78125ZM11 18.5625C8.4425 18.5625 6.20125 17.2975 4.82625 15.3588C4.9775 13.365 8.97875 12.375 11 12.375C13.0212 12.375 17.0225 13.365 17.1737 15.3588C15.7987 17.2975 13.5575 18.5625 11 18.5625Z" fill="#CFCFCF" />
                </svg>
            </label>

            <input name="name" id="name" type="text" placeholder="Je naam" class="border-b border-gray-400 flex-1 rounded-none py-1 placeholder-gray-300 italic outline-none focus:border-primary-400" :value="old('name')" required autofocus autocomplete="name">

        </div>
        <x-input-error :messages="$errors->get('name')" class="mt-2 ml-[38px]" />
    </div>

    <!-- Email Address -->
    <div class="mb-5">
        <div class="flex items-center">
            <label for="email" class="w-[22px] inline-block text-right mr-4 text-gray-500 text-gray-500">
                <svg fill="none" height="22" viewBox="0 0 22 22" width="22" xmlns="http://www.w3.org/2000/svg">
                    <path d="m11 .00045181c-2.88675-.02653371-5.66596 1.11657819-7.72808 3.17860819-2.06212 2.06204-3.2387863 4.87465-3.27192 7.82094.0331337 2.9463 1.2098 5.7589 3.27192 7.8209 2.06212 2.0621 4.84133 3.2052 7.72808 3.1786 2.2097.0077 4.3712-.6584 6.2075-1.9129.1278-.0875.2374-.1998.3226-.3305.0852-.1308.1444-.2773.1741-.4314.0297-.154.0294-.3126-.0009-.4665s-.09-.3003-.1757-.4306c-.0858-.1304-.1958-.2423-.3239-.3293-.128-.0869-.2716-.1473-.4226-.1776-.1509-.0304-.3062-.0301-.4571.0009-.1508.0309-.2941.0918-.4219.1793-1.4503.9899-3.1574 1.5149-4.9021 1.5074-2.26556.0271-4.44918-.8639-6.07206-2.4776-1.62287-1.6137-2.55253-3.8184-2.58512-6.1307.03259-2.31227.96225-4.51699 2.58512-6.1307 1.62288-1.61372 3.8065-2.50472 6.07206-2.47764 2.2656-.02708 4.4492.86392 6.0721 2.47764 1.6228 1.61371 2.5525 3.81843 2.5851 6.1307v.8522c-.0152.4823-.2136.9397-.5532 1.2754-.3397.3357-.7939.5235-1.2667.5235s-.9271-.1878-1.2667-.5235c-.3397-.3357-.5381-.7931-.5532-1.2754v-.8522c.0175-1.01671-.2619-2.01572-.8027-2.86979-.5407-.85407-1.3182-1.52453-2.2336-1.926-.9154-.40146-1.9271-.51575-2.9063-.32831-.97921.18743-1.8816.66812-2.59223 1.38083-.71062.7127-1.19732 1.62517-1.39809 2.62117-.20078.996-.10654 2.0305.2707 2.9716.37724.9412 1.02042 1.7464 1.8476 2.3132.82718.5667 1.80092.8694 2.79722.8694.6749.0001 1.343-.1382 1.9645-.4067.6216-.2684 1.184-.6616 1.6537-1.1562.5391.6747 1.2684 1.164 2.0891 1.4014.8207.2375 1.693.2116 2.4988-.0741.8058-.2856 1.5061-.8173 2.0058-1.5228.4998-.7056.7749-1.5509.7881-2.4215v-.8522c-.0331-2.94629-1.2098-5.7589-3.2719-7.82094-2.0621-2.06203-4.8414-3.2051419-7.7281-3.17860819zm0 13.64034819c-.5082-.017-1.00027-.1865-1.41475-.4872-.41447-.3006-.73304-.7192-.91595-1.2035-.18291-.4842-.22206-1.0128-.11258-1.5196.10949-.50681.36276-.96952.72823-1.33038.36547-.36087.82695-.60391 1.32685-.69881.5-.0949 1.0162-.03745 1.4843.16517.4682.20262.8675.54145 1.1482.97421.2807.43277.4304.94031.4303 1.45931-.0126.7119-.3012 1.3896-.8026 1.8846-.5013.495-1.1745.767-1.872.7562z" fill="#cfcfcf" />
                </svg>
            </label>
            <input name="email" id="email" type="text" placeholder="Je e-mailadres" class="border-b border-gray-400 flex-1 rounded-none py-1 placeholder-gray-300 italic outline-none focus:border-primary-400"  :value="old('email')" required autocomplete="username">
        </div>
        <x-input-error :messages="$errors->get('email')" class="mt-2 ml-[38px]" />
    </div>

    <!-- Password -->
    <div class="mb-5">
        <div class="flex items-center">
            <label for="password" class="w-[22px] inline-block text-right mr-4 text-gray-500 text-gray-500">
                <svg fill="none" height="22" viewBox="0 0 18 22" width="18" xmlns="http://www.w3.org/2000/svg">
                    <path d="m15.75 7.33333h-1.125v-2.09523c0-2.89143-2.52-5.2381-5.625-5.2381s-5.625 2.34667-5.625 5.2381v2.09523h-1.125c-1.2375 0-2.25.94286-2.25 2.09524v10.47623c0 1.1523 1.0125 2.0952 2.25 2.0952h13.5c1.2375 0 2.25-.9429 2.25-2.0952v-10.47623c0-1.15238-1.0125-2.09524-2.25-2.09524zm-6.75 9.42857c-1.2375 0-2.25-.9429-2.25-2.0952 0-1.1524 1.0125-2.0953 2.25-2.0953s2.25.9429 2.25 2.0953c0 1.1523-1.0125 2.0952-2.25 2.0952zm3.4875-9.42857h-6.975v-2.09523c0-1.79143 1.56375-3.24762 3.4875-3.24762 1.9237 0 3.4875 1.45619 3.4875 3.24762z" fill="#cfcfcf" />
                </svg>
            </label>

            <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="Wachtwoord" class="border-b border-gray-400 rounded-none flex-1 py-1 placeholder-gray-300 italic outline-none focus:border-primary-400" >

        </div>
        <x-input-error :messages="$errors->get('password')" class="mt-2 ml-[38px]" />
    </div>

    <!-- Confirm Password -->
    <div class="mb-5">
        <div class="flex items-center">
            <label for="password_confirmation" class="w-[22px] inline-block text-right mr-4 text-gray-500 text-gray-500">
                <svg fill="none" height="22" viewBox="0 0 18 22" width="18" xmlns="http://www.w3.org/2000/svg">
                    <path d="m15.75 7.33333h-1.125v-2.09523c0-2.89143-2.52-5.2381-5.625-5.2381s-5.625 2.34667-5.625 5.2381v2.09523h-1.125c-1.2375 0-2.25.94286-2.25 2.09524v10.47623c0 1.1523 1.0125 2.0952 2.25 2.0952h13.5c1.2375 0 2.25-.9429 2.25-2.0952v-10.47623c0-1.15238-1.0125-2.09524-2.25-2.09524zm-6.75 9.42857c-1.2375 0-2.25-.9429-2.25-2.0952 0-1.1524 1.0125-2.0953 2.25-2.0953s2.25.9429 2.25 2.0953c0 1.1523-1.0125 2.0952-2.25 2.0952zm3.4875-9.42857h-6.975v-2.09523c0-1.79143 1.56375-3.24762 3.4875-3.24762 1.9237 0 3.4875 1.45619 3.4875 3.24762z" fill="#cfcfcf" />
                </svg>
            </label>

            <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Herhaal wachtwoord" class="border-b border-gray-400 rounded-none flex-1 py-1 placeholder-gray-300 italic outline-none focus:border-primary-400">

        </div>
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 ml-[38px]" />
    </div>

    <div class="mb-2 mt-8">
        <div class="flex items-center gap-2">
            <input
                type="checkbox" id="privacy" name="privacy"

               @class([
                    'w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600',
                    'border-red-500' => $errors->get('privacy'),
                ])
            />
            <label for="privacy" class="italic text-sm ml-1">Ja, ik ga akkoord met het <a href="/privacy-beleid">privacybeleid</a> (verplicht). </label>

        </div>
        <x-input-error :messages="$errors->get('privacy')" class="mt-2 ml-[28px]" />
    </div>
    <div class="mb-6 flex items-center gap-2">
        <input type="checkbox" id="news" name="news" class="w-4 h-4 text-primary-600 bg-gray-100 border-gray-300 rounded focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" />
        <label for="news" class="italic text-sm ml-1">Ja, ik wil graag updates ontvangen. Je kan je altijd uitschrijven. </label>
    </div>

    <div class="flex gap-4 items-center justify-end mt-4">
        @if (! ($hideAlreadyRegistered ?? false))
        <a wire:navigate class="underline whitespace-nowrap text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 block" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
        @endif

        <button class="py-2 px-8 bg-primary-500 text-primary-100 font-bold w-full rounded-full" type="submit" value="Registreren">Registreren</button>
    </div>
</form>
