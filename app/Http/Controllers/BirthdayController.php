<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Birthdays;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\BirthdayReminderMail;

use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    /**
     * Récupérer les anniversaires à venir dans les 7 prochains jours.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getUpcomingBirthdays()
{
    // Récupérer les anniversaires qui se produisent dans les 7 prochains jours
    $upcomingBirthdays = Birthdays::whereBetween('date', [Carbon::now(), Carbon::now()->addDays(7)])
        ->where('notification_sent', false) // On filtre ceux dont le rappel n'a pas encore été envoyé
        ->get();

    return $upcomingBirthdays;
}

public function showUpcomingBirthdays()
{
    // Récupérer les anniversaires à venir
    $upcomingBirthdays = $this->getUpcomingBirthdays()->map(function ($birthday) {
        return [
            'id' => $birthday->id,
            'date' => $birthday->date,
            'user' => [
                'name' => $birthday->user->name,
                'profile_picture' => $birthday->user->profile_picture, 
            ],
        ];
    });

    return Inertia::render('UpcomingBirthdays', [
        'birthdays' => $upcomingBirthdays,
    ]);
}

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

    // Marquer la notification comme envoyée dans la base de données
    $birthday->update(['notification_sent' => true]);
}

}
