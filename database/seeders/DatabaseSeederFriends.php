<?php

namespace Database\Seeders;

use App\Models\Friends;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeederFriends extends Seeder
{
    /**
     * Exécuter les seeders pour les relations d'amitié.
     *
     * @return void
     */
    public function run(): void
    {
        // Récupérer tous les utilisateurs
        $users = User::all();

        // Créer des amitiés aléatoires entre les utilisateurs
        foreach ($users as $user) {
            // Sélectionner un nombre aléatoire d'amis pour chaque utilisateur (par exemple, entre 1 et 5 amis)
            $friends = $users->where('id', '!=', $user->id)->random(rand(1, 5));

            foreach ($friends as $friend) {
                // Assurer que chaque relation d'amitié est unique (éviter les doublons)
                if (!Friends::where('user_id', $user->id)->where('friend_id', $friend->id)->exists() &&
                    !Friends::where('user_id', $friend->id)->where('friend_id', $user->id)->exists()) {
                    // Créer une relation d'amitié entre l'utilisateur et l'ami
                    Friends::create([
                        'user_id' => $user->id,
                        'friend_id' => $friend->id,
                    ]);
                }
            }
        }
    }
}
