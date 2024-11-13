<?php

namespace App\Console\Commands;

use App\Models\Birthdays;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendBirthdayReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-birthday-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envoie des rappels d’anniversaire aux utilisateurs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Récupérer les anniversaires à venir dans les 7 prochains jours
        $upcomingBirthdays = Birthdays::whereBetween('date', [now(), now()->addDays(7)])
            ->where('notification_sent', false)
            ->get();

        if ($upcomingBirthdays->isEmpty()) {
            $this->info('Aucun anniversaire à venir dans les 7 prochains jours.');
            return;
        }

        foreach ($upcomingBirthdays as $birthday) {
            $this->sendBirthdayReminder($birthday);
        }

        $this->info('Rappels d’anniversaire envoyés.');
    }

    /**
     * Envoie un email de rappel pour un anniversaire donné.
     *
     * @param \App\Models\Birthday $birthday
     */
    private function sendBirthdayReminder($birthday)
    {
        $user = $birthday->user;
        $data = [
            'user' => $user,
            'birthday' => $birthday,
        ];

        // Envoi de l'email
        Mail::send('emails.birthday_reminder', $data, function ($message) use ($user) {
            $message->to($user->email)
                    ->subject("Rappel : L'anniversaire de votre ami(e) est demain !");
        });

        // Marquer la notification comme envoyée
        $birthday->update(['notification_sent' => true]);
    }
}
