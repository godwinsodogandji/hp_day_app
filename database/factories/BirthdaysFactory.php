<?php

namespace Database\Factories;

use App\Models\User; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Birthdays>
 */
class BirthdaysFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // Lier à un utilisateur existant 
            'date' => $this->faker->dateTimeBetween('now', '+1 year')->format('Y-m-d'), // Date d'anniversaire aléatoire
            'notification_sent' => false, // Initialiser à false
        ];
    }
}