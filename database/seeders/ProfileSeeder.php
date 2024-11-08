<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profiles;

class ProfileSeeder extends Seeder
{
    public function run()
    {
        // Créer 10 profils fictifs
        Profiles::factory()->count(10)->create();
    }
}
