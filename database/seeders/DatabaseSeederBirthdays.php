<?php

namespace Database\Seeders;

use App\Models\Birthdays;
use App\Models\User; // Modèle User pour faire référence aux utilisateurs
use Illuminate\Database\Seeder;

class DatabaseSeederBirthdays extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer tous les utilisateurs
        $users = User::all();

        foreach ($users as $user) {
            // Créer un enregistrement d'anniversaire pour chaque utilisateur
            Birthdays::create([
                'user_id' => $user->id,
                'date' => $this->generateRandomBirthday(), 
                'notification_sent' => false, 
            ]);
        }
    }

    /**
     * Générer une date d'anniversaire aléatoire.
     *
     * @return string
     */
    private function generateRandomBirthday(): string
    {
        // Générer une date d'anniversaire aléatoire (ex: entre 1950 et 2000)
        return now()->subYears(rand(18, 70))->format('Y-m-d');
    }
}