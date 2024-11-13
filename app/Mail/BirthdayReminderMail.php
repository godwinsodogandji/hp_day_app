<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BirthdayReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $birthday; // Propriété pour stocker les informations d'anniversaire

    /**
     * Create a new message instance.
     *
     * @param $birthday
     */
    public function __construct($birthday)
    {
        $this->birthday = $birthday; // Assigner l'anniversaire passé au constructeur
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rappel d\'Anniversaire', // Sujet de l'e-mail
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'birthday_reminder', // Vue à utiliser pour le contenu de l'e-mail
            with: [
                'birthday' => $this->birthday, // Passer les données à la vue
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return []; // Aucune pièce jointe pour le moment
    }
}