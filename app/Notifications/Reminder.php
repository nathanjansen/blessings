<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;

class Reminder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database', 'mail', WebPushChannel::class];
    }

    public function toMail(object $notifiable, $notification = null): MailMessage
    {
        return (new MailMessage)
            ->greeting("Hej $notifiable->name! Het is weer tijd om je zegeningen op te schrijven.")
            ->line('Wat voor goeds heeft de Heer vandaag voor jou gedaan?')
            ->action('Zegening opschrijven', config('app.url'))
            ->line('Gods zegen!');
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toWebPush(object $notifiable, $notification = null): WebPushMessage
    {
        return (new WebPushMessage())
            ->title('Approved!')
//            ->icon('/approved-icon.png')
            ->body('Your account was approved!')
//            ->action('View account', 'view_account')
            ->options(['TTL' => 1000]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
