<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class Webpush
{
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        // TODO get webpush credentials for this user
        //  when they use web in stead of nativephp

        //        $vapidKeys = VAPID::createVapidKeys();

        $keys = [
            'publicKey' => 'BJH_4SKkSf71iRx9jXLe-m-oHeBPGaNIhaNlfplMQCrU85iSQ17nHbq_utAlCHxLQB3X2Hf6I2Y22TnYqCPWl90',
            'privateKey' => 'TI-5clxQtKowtHeK37hdZLpWoDNcg20n9-Kxha1jKFE',
        ];

        Config::set('webpush.vapid.subject', 'test');
        Config::set('webpush.vapid.public_key', $keys['publicKey']);
        Config::set('webpush.vapid.private_key', $keys['privateKey']);

        return $next($request);
    }
}
