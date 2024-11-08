<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Pest\Plugins\Profiles;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Appeler les seeders individuels ici
        $this->call(ProfileSeeder::class); // Exemple pour ajouter un seeder pour la table profiles
        // Ajoutez d'autres seeders si nécessaire, comme UserSeeder, PostSeeder, etc.
    }
}
