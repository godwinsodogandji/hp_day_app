<?php

namespace Database\Factories;

use App\Models\User; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notifications>
 */
class NotificationsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), 
            'message' => $this->generateRandomMessage(), // Générer un message aléatoire
            'is_read' => false, // Initialiser à false
        ];
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