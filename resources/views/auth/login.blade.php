<x-layouts.guest body-class="bg-transparant">

    <div class="w-screen h-full bg-primary-100 absolute top-0 left-0 -z-50 left-1/4  border-t-8 border-r-8 border-b-8 border-white"></div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <h1 class="text-xl font-bold mb-6">Inloggen bij MyBlessings</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember" checked>
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a wire:navigate class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
        </div>

        <button class="mt-6 py-2 px-8 bg-primary-500 text-primary-100 font-bold w-full rounded-full" type="submit">{{ __('Log in') }}</button>

        <a href="{{ route('register') }}" class="mt-4 block text-gray-600 text-sm" role="button">
            Nog geen account? <span class="underline">Registreer</span>
        </a>
    </form>
</x-layouts.guest>
