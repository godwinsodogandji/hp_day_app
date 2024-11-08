<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\User::class;

    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = User::class;
    public function definition(): array
    {
        
        return [
            'username' => $this->faker->unique()->userName(), 
            'email' => $this->faker->unique()->safeEmail(), 
            'email_verified_at' => now(), 
            'password' => static::$password ??= Hash::make('password'), 
            'remember_token' => Str::random(10), 
            'birthday' => $this->faker->dateTimeBetween('-40 years', '-18 years')->format('Y-m-d'), 
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null, // Email non vérifié
        ]);
    }
}