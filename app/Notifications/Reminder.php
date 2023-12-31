<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Verse;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\HtmlString;
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
        if ($this->isOptout($notifiable)) {
            return [];
        }

        return ['database', 'mail', WebPushChannel::class];
    }

    public function isOptout(object $notifiable)
    {
        if (! $notifiable instanceof User) return true;

        return ! ($notifiable->notification_subscriptions['daily_reminder'] ?? true);
    }

    public function toMail(object $notifiable, $notification = null): MailMessage
    {
        $verse = Verse::today();

        $subjects = [
            'Welke blessings wil jij onthouden?',
            'Wat maakte jouw dag?',
            'Vergeet je blessings niet!',
            'Eindig je dag met blessings',
            'Neem tijd voor je blessings',
            'Wie of wat maakte jou blij?',
            'Tel je zegeningen',
        ];

        $unsubscribeLink = Url::signedRoute('unsubscribe-notification', [
            'list' => 'daily_reminder',
            'user' => $notifiable->id,
        ]);

        return (new MailMessage)
            ->subject($subjects[rand(0, count($subjects) - 1)])
            ->greeting("Hej $notifiable->name!")
            ->line('Sta je ook vandaag (weer) even stil bij je zegeningen. Waar mag jij vandaag dankbaar voor zijn?')
            ->action('Vul je dankpunt(en) in', config('app.url'))
            ->line(new HtmlString('<p class="verse">' . $verse?->text .'</p>'))
            ->line(new HtmlString('<p class="verse-number">' . $verse?->verse .'</p>'))
            ->line(new HtmlString('<p><a href="' . $unsubscribeLink . '">Uitschrijven</a></p>'))
            ->salutation(' ');
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toWebPush(object $notifiable, $notification = null): WebPushMessage
    {
        $verse = Verse::today();

        return (new WebPushMessage())
            ->title('Waar mag jij vandaag dankbaar voor zijn?')
//            ->icon('/approved-icon.png')
            ->body('Sta je ook vandaag (weer) even stil bij je zegeningen.')
            ->action('Zegening opschrijven', 'index')
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
