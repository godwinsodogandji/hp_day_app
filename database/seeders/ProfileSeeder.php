<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profiles;
use Stichoza\GoogleTranslate\GoogleTranslate;

class ProfileSeeder extends Seeder
{
    public function run()
    {
          // Exemple de texte "Lorem Ipsum"
          $bioTexts = [
            'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'Vivamus luctus urna sed urna ultricies ac tempor dui sagittis.',
            'Curabitur sit amet mauris morbi in dui quis est pulvinar ullamcorper.',
        ];

        // Traduire les textes en français
        $translatedBios = array_map(function ($text) {
            return GoogleTranslate::trans($text, 'fr'); // Traduire en français
        }, $bioTexts);

        // Créer 10 profils fictifs
        Profiles::factory()->count(10)->create()->each(function ($profile, $index) use ($translatedBios) {
            // Assigner une bio traduite aléatoire à chaque profil
            $profile->bio = $translatedBios[$index % count($translatedBios)];
            $profile->save();
        });
        // Créer 10 profils fictifs
        // Profiles::factory()->count(10)->create();
        
    }

}
