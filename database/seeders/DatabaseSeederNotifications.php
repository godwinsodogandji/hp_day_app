<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Notification;

class DatabaseSeederNotifications extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer tous les utilisateurs
        $users = User::all();

        foreach ($users as $user) {
            // Créer quelques notifications pour chaque utilisateur
            for ($i = 0; $i < 3; $i++) {
                Notification::create([
                    'user_id' => $user->id,
                    'message' => $this->generateRandomMessage(), 
                    'is_read' => false, // Initialiser à false
                ]);
            }
        }
    }

    /**
     * Générer un message aléatoire pour la notification.
     *
     * @return string
     */
    private function generateRandomMessage(): string
    {
        $messages = [
            'Vous avez un nouveau message.',
            'Votre profil a été mis à jour.',
            'Vous avez un nouvel ami.',
            'Une nouvelle fonctionnalité est disponible.',
            'N’oubliez pas votre anniversaire !',
        ];

        return $messages[array_rand($messages)]; // Choisir un message aléatoire
    }
}