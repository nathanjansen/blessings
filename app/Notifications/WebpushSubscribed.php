<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class WebpushSubscribed extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    public function via(object $notifiable): array
    {
        return [WebPushChannel::class];
    }

    public function toWebPush(object $notifiable): WebPushMessage
    {
        return (new WebPushMessage)
            ->title('Notificaties ingeschakeld')
//            ->icon('/approved-icon.png')
            ->body('Vanaf nu ontvang je notificaties')
//            ->action('Start hier', 'index')
            ->options(['TTL' => 1000]);
    }

    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
