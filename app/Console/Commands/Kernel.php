<?php

use App\Models\Birthdays;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Mail\BirthdayReminderMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Planifier une tâche qui s'exécute tous les jours à minuit
        $schedule->call(function () {
            // Récupérer les anniversaires à venir dans les 7 prochains jours
            $upcomingBirthdays = Birthdays::whereBetween('date', [Carbon::now(), Carbon::now()->addDays(7)])
                ->where('notification_sent', false)
                ->get();

            // \Log::info('Checking for upcoming birthdays...');
            // \Log::info('Found ' . $upcomingBirthdays->count() . ' upcoming birthdays.');

            // Envoyer les rappels pour chaque anniversaire
            foreach ($upcomingBirthdays as $birthday) {
                $user = $birthday->user;
                $this->sendBirthdayReminder($user, $birthday);
            }
        })->daily(); // Exécution quotidienne
    }

    protected function sendBirthdayReminder($user, $birthday)
    {
        // Logique pour envoyer un rappel d'anniversaire
        Mail::to($user->email)->send(new BirthdayReminderMail($birthday));
        
        // Marquer l'anniversaire comme notifié
        $birthday->notification_sent = true;
        $birthday->save();
    }

    protected function commands()
    {
        // Registre des commandes artisan
    }
}