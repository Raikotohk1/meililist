<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $event;
    public $email;

    public function __construct(Event $event, string $email)
    {
        $this->event = $event;
        $this->email = $email;
    }

    public function build()
    {
        return $this->view('emails.invitation')
                    ->subject('You are invited to ' . $this->event->name)
                    ->with([
                        'event' => $this->event,
                        'email' => $this->email,
                    ]);
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Event Invitation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invitation',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
