<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class Reminder extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public User $user)
    {
        //
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Waar mag jij vandaag dankbaar voor zijn?',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.reminder',
            with: [
                'url' => config('app.url'),
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
