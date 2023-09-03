<?php

namespace App\Notifications;

use App\Models\Verse;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
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
        return ['database', 'mail', WebPushChannel::class];
    }

    public function toMail(object $notifiable, $notification = null): MailMessage
    {
        $verse = Verse::today();

        $subjects = [
            'Waar mag jij vandaag dankbaar voor zijn?',
            'Koester je dagelijkse dankbaarheid?',
            'Geeft dankbaar zijn je vreugde?',
            'Schrijf je dagelijkse vreugde op?',
            'Voedt dankbaarheid je positiviteit?',
            'Vang je geluk door dankbaarheid?',
            'Is dankbaar zijn als innerlijke straling?',
            'Ben je elke dag voor iets dankbaar?',
            'Is dankbaarheid jouw gewoonte?',
            'Groei je door dankbaarheid?',
            'Verrijkt dankbaarheid je leven?',
        ];

        return (new MailMessage)
            ->subject($subjects[rand(0, 10)])
            ->greeting("Hej $notifiable->name!")
            ->line('Sta je ook vandaag (weer) even stil bij je zegeningen. Waar mag jij vandaag dankbaar voor zijn?')
            ->action('Vul je dankpunt(en) in', config('app.url'))
            ->line(new HtmlString('<p class="verse">' . $verse?->text .'</p>'))
            ->line(new HtmlString('<p class="verse-number">' . $verse?->verse .'</p>'))
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
