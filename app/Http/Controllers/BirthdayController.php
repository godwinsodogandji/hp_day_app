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

   public function getUpcomingBirthdays(Request $request)
{
    // Nombre d'anniversaires à afficher par page (par exemple 5)


    // Charger les anniversaires à venir avec l'utilisateur et son profil
    $upcomingBirthdays = Birthdays::with('user.profile') // Charger la relation 'user' et 'profile'
        ->whereBetween('date', [Carbon::now(), Carbon::now()->addDays(7)])
        ->where('notification_sent', false)
        ->get();

    return $upcomingBirthdays;
}


public function showUpcomingBirthdays(Request $request)
{
    $upcomingBirthdays = $this->getUpcomingBirthdays($request)->map(function ($birthday) {
        return [
            'id' => $birthday->id,
            'date' => $birthday->date,
            'user' => [

                'name' => $birthday->user->username, // Utiliser 'username' ou 'name' selon votre modèle
                'profile_picture' => $birthday->user->profile ? $birthday->user->profile->avatar : null, // L'avatar du profil

            ],
        ];
    });

    // Passer les données paginées à Inertia, y compris le nombre total de pages et la page actuelle
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
