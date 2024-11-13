<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Birthdays;
use App\Models\User;
use Carbon\Carbon;
use App\Mail\BirthdayReminderMail;
use Illuminate\Support\Facades\Mail;

class SendBirthdayReminders extends Command
{
    protected $signature = 'send:birthday-reminders';
    protected $description = 'Envoie les rappels d\'anniversaires pour les anniversaires du jour suivant';

    public function handle()
    {
        $tomorrow = Carbon::tomorrow()->toDateString();

        // Récupérer tous les anniversaires pour demain
        $birthdays = Birthdays::with('user')->whereDate('date', $tomorrow)
            ->where('notification_sent', false)
            ->get();

        foreach ($birthdays as $birthday) {
            // Envoyer le rappel d'anniversaire par mail
            $this->sendBirthdayReminder($birthday->user, $birthday);

            // Marquer l'anniversaire comme traité
            $birthday->update(['notification_sent' => true]);
        }

        $this->info('Tous les rappels d\'anniversaires ont été envoyés avec succès.');
    }


    /**
     * Envoie un email de rappel pour un anniversaire donné.
     *
     * @param \App\Models\Birthdays $birthday
     */

    public function sendBirthdayReminder($user, $birthday)

    {
        $data = [
            'user' => $user,
            'birthday' => $birthday
        ];

        // Envoi de l'email
        Mail::send('birthday_reminder', $data, function ($message) use ($user) {
            $message->to($user->email)
                    ->subject("Rappel : L'anniversaire de votre ami(e) est demain !");
        });
    }
}
