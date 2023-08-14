<?php

namespace App\Providers;

use App\Support\AutoInjectWebpushAssets;
use Illuminate\Support\ServiceProvider;
use Livewire\Volt\Volt;

class WebpushServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        AutoInjectWebpushAssets::provide();
    }
}
