<?php 
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Emails;
use App\Mail\BirthdayEmail;
use Exception;

class EmailSeederBirthdays extends Seeder
{
    public function run()
    {
        $users = User::whereDay('birthday', now()->day)
                     ->whereMonth('birthday', now()->month)
                     ->get();

        foreach ($users as $user) {
            try {
                // Envoyer l'email
                Mail::to($user->email)->send(new BirthdayEmail($user));

                // Enregistrer l'email dans la base de données
                Emails::create([
                    'user_id' => $user->id,
                    'recipient' => $user->email,
                    'subject' => 'Joyeux Anniversaire !',
                    'body' => "Joyeux anniversaire, {$user->name} !",
                    'status' => 'sent',
                    'sent_at' => now(),
                ]);

                // Afficher une confirmation
                echo "Email envoyé à : {$user->email}\n";

                // Attendre 1 seconde entre chaque envoi
                sleep(1);

            } catch (Exception $e) {
                // En cas d'erreur, afficher l'erreur et passer au suivant
                echo "Erreur lors de l'envoi de l'email à {$user->email}: " . $e->getMessage() . "\n";
            }
        }
    }
}
