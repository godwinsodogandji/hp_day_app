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
            'user_id' => User::factory(), 
            'recipient' => $this->faker->unique()->safeEmail(), 
            'subject' => $this->faker->sentence(6), 
            'body' => $this->faker->paragraph(), 
            'status' => $this->faker->randomElement(['pending', 'sent', 'failed']), 
            'sent_at' => $this->faker->optional()->dateTime(), 
        ];
    }
}
