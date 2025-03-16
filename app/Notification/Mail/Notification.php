<?php

declare(strict_types=1);

namespace App\Notification\Mail;

use App\Notification\DTO\MessageDTO;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        private readonly MessageDTO $message
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->message->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'notification.mail',
            with: [
                'subject' => $this->message->subject,
                'body' => $this->message->body,
            ]
        );
    }
}
