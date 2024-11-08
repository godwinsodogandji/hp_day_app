<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profiles>
 */
class ProfilesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(), 
            'full_name' => $this->faker->name(), 
            'bio' => $this->faker->paragraph(), 
            'avatar' => $this->faker->imageUrl(640, 480, 'people'), 
            'birthday' => $this->faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'), 
        ];
    }
}