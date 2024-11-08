<?php

namespace Database\Factories;

use App\Models\User; 
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Friends>
 */
class FriendsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(), // L'utilisateur qui a ajouté l'ami
            'friend_id' => User::factory(), // L'utilisateur qui est l'ami
            'status' => $this->faker->randomElement(['pending', 'accepted', 'blocked']), // Statut de l'amitié
        ];
    }
}