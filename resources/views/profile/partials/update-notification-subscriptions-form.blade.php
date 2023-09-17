<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Notifications') }}
        </h2>
    </header>

    @volt('notifications-form')
    <form wire.submit="save" id="form" class="mt-6 space-y-6">
        <div class="flex flex-col gap-4 w-full">
            <x-toggle label="{{ __('Daily reminder') }}" wire:model="daily_reminder" />
            <x-toggle label="{{ __('Newsletter') }}" wire:model="newsletter" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button type="button" wire:click="save">{{ __('Save') }}</x-primary-button>

            @if ($this->saved)
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => $wire.set('saved', false), 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
    @endvolt
</section>

<?php

use function Livewire\Volt\state;

state(
    user: fn() => auth()->user(),
    daily_reminder: fn() => auth()->user()->notification_subscriptions['daily_reminder'] ?? false,
    newsletter: fn() => auth()->user()->notification_subscriptions['newsletter'] ?? false,
    saved: false,
);

$save = function() {
    $this->user->updateSubscriptions(
        daily_reminder: $this->daily_reminder,
        newsletter: $this->newsletter,
    );
    $this->saved = true;
};
