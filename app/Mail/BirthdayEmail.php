<?php

 namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BirthdayEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Créer une nouvelle instance du message.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user; // Passer l'utilisateur pour personnaliser l'email
    }

    /**
     * Construire le message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Joyeux Anniversaire !') // Sujet
                    ->view('email.birthday')  
                    ->with([
                        'username' => $this->user->username, // Passer le nom d'utilisateur
                        'birthday' => $this->user->birthday, // Passer la date d'anniversaire
                    ]);
    }
}
