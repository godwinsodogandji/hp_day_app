<?php

namespace Database\Factories;

use App\Models\User; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Emails>
 */
class EmailsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Lier à un utilisateur existant ou en créer un
            'recipient' => $this->faker->unique()->safeEmail(), // Adresse email du destinataire
            'subject' => $this->faker->sentence(6), // Sujet de l'email
            'body' => $this->faker->paragraph(), // Contenu de l'email
            'status' => $this->faker->randomElement(['pending', 'sent', 'failed']), // Statut de l'email
            'sent_at' => $this->faker->optional()->dateTime(), // Date et heure d'envoi (nullable)
        ];
    }
}