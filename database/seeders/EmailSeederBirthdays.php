<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Emails;
use App\Mail\BirthdayEmail;

class EmailSeederBirthdays extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Récupérer les utilisateurs dont l'anniversaire est aujourd'hui
        $users = User::whereDay('birthday', now()->day)
                     ->whereMonth('birthday', now()->month)
                     ->get();

        // S'il y a des utilisateurs avec un anniversaire aujourd'hui
        if ($users->isNotEmpty()) {
            foreach ($users as $user) {
                try {
                    // Envoyer l'email
                    Mail::to($user->email)->send(new BirthdayEmail($user));

                    // Vérifier si l'email a bien été envoyé
                    if (Mail::failures()) {
                        throw new \Exception("L'email à {$user->email} a échoué.");
                    }

                    // Enregistrer l'email dans la base de données
                    Emails::create([
                        'user_id' => $user->id,
                        'recipient' => $user->email,
                        'subject' => 'Joyeux Anniversaire !',
                        'body' => "Joyeux anniversaire, {$user->username} !",
                        'status' => 'sent',
                        'sent_at' => now(),
                    ]);

                    // Afficher une confirmation
                    echo "Email envoyé à : {$user->email}\n";

                } catch (\Exception $e) {
                    // En cas d'erreur d'envoi, afficher l'erreur et passer à l'utilisateur suivant
                    echo "Erreur lors de l'envoi de l'email à {$user->email}: " . $e->getMessage() . "\n";
                }
            }
        } else {
            // Message en cas de non-existence d'utilisateurs avec un anniversaire aujourd'hui
            echo "Aucun utilisateur n'a son anniversaire aujourd'hui.\n";
        }
    }
}
