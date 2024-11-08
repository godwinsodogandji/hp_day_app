<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeederUsers extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crée un utilisateur de test
        User::factory()->create([
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('password123'), 
            'birthday' => '1990-01-01', // Date d'anniversaire
        ]);

        // Crée 10 utilisateurs supplémentaires avec des données aléatoires
        User::factory(10)->create()->each(function ($user) {
            $user->update([
                'password' => bcrypt('password123'), 
                'birthday' => now()->subYears(rand(18, 40))->format('Y-m-d'), 
            ]);
        });
    }
}