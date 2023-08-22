<?php

namespace App\Console\Commands;

use App\Notifications\Reminder;
use App\Models\User;
use Illuminate\Console\Command;

class SendRemindersCommand extends Command
{
    protected $signature = 'app:send-reminders';

    public function handle()
    {
        /** @var User $user */
        foreach (User::all() as $user) {
            $user->notify(new Reminder($user));
        }
    }
}
