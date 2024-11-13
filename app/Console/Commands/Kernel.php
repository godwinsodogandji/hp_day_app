<?php

use App\Models\Birthdays;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Mail\BirthdayReminderMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CommandKernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Planifier une tâche qui s'exécute tous les jours à minuit
        $schedule->call(function () {
            // Récupérer les anniversaires à venir dans les 7 prochains jours
            $upcomingBirthdays = Birthdays::whereBetween('date', [Carbon::now(), Carbon::now()->addDays(7)])
                ->where('notification_sent', false)
                ->get();

    
            // Envoyer les rappels pour chaque anniversaire
            foreach ($upcomingBirthdays as $birthday) {
                $user = $birthday->user;
                $this->sendBirthdayReminder($user, $birthday);
            }
        })->daily(); // Exécution quotidienne
    }

    protected function sendBirthdayReminder($user, $birthday)
    {
        try {
            // Logique pour envoyer un rappel d'anniversaire
            Mail::to($user->email)->send(new BirthdayReminderMail($birthday));
    
            // Marquer l'anniversaire comme notifié
            $birthday->notification_sent = true;
            $birthday->save();
        } catch (\Exception $e) {
            // Log error if email fails
            // \Log::error('Failed to send birthday reminder for user ' . $user->id . ': ' . $e->getMessage());
        }
    }
    

    protected function commands()
    {
        // Registre des commandes artisan
    }
}