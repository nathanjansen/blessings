<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class UnsubscribeNotification extends Controller
{
    public function __invoke(string $list, User $user)
    {
        if (! request()->hasValidSignature()) {
            abort(401);
        }

        $listName = match ($list) {
            'daily_reminder' => 'Dagelijkse herinnering',
            'newsletter' => 'Nieuwsbrief',
        };

        $user->unsubscribe($list);

        return Blade::render('
            <x-layouts.app>
                <div class="max-w-3xl mx-auto" style="margin-top: 40px;">
                    Je bent nu uitgeschreven voor de blessings '. $listName .'.<br />
                    Mocht je je weer in willen schrijven dan kan dat altijd via instellingen nadat je bent ingelogd.<br />
                    <a href="/">Terug naar de website<a>
                </div>
            </x-layouts.app>
        ');
    }
}
