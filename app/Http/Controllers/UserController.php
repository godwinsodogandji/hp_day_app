<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function getAllUsers(): JsonResponse
    {
        try {
            // Récupère tous les utilisateurs depuis la base de données
            $users = User::all();

            // Retourne les utilisateurs en JSON
            return response()->json(['users' => $users], 200);
        } catch (\Exception $e) {
            // Gère les erreurs
            return response()->json(['error' => 'Erreur lors de la récupération des utilisateurs.'], 500);
        }
    }
    public function getUserById(int $id): JsonResponse
    {
        try {
            // Récupère l'utilisateur par son ID
            $user = User::findOrFail($id);

            // Retourne l'utilisateur en JSON
            return response()->json(['user' => $user], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Gestion de l'erreur si l'utilisateur n'est pas trouvé
            return response()->json(['error' => 'Utilisateur non trouvé.'], 404);
        } catch (\Exception $e) {
            // Gère les autres erreurs
            return response()->json(['error' => 'Erreur lors de la récupération de l’utilisateur.'], 500);
        }
    }
}

