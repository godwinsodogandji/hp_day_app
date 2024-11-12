<?php
namespace App\Http\Controllers;

use App\Mail\UserRegistrationMail;
use App\Models\User;
use App\Notifications\UserNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class UserController extends Controller
{
    // public function getAllUsers(): JsonResponse
    // {
    //     try {
    //         $users = User::all();
    //         return response()->json(['users' => $users], 200);
    //     } catch (\Exception $e) {
    //         return response()->json(['error' => 'Erreur lors de la récupération des utilisateurs.'], 500);
    //     }
    // }
    public function index()
    {
        $users = User::paginate(12); // Récupère tous les utilisateurs
        return inertia('Users/List', ['users' => $users]);
    }

    public function show(User $user)
    {
        return Inertia::render('Users/Show', ['user' => $user]);
    }

    public function notify(Request $request, User $user)
    {
        $message = $request->input('message');
        $username = $user->name;  // Exemple : Récupérer le nom de l'utilisateur
        $password = 'examplepassword';  // Vous devez définir un mot de passe ou le récupérer

        // Envoi de l'e-mail avec la classe UserRegistrationMail
        Mail::to($user->email)->send(new UserRegistrationMail($username, $password));

        // Envoi de la notification
        $user->notify(new UserNotification($message));

        return redirect()->route('users.index')->with('success', 'Notification sent successfully!');
    }

 

    public function getUserById(int $id): JsonResponse
    {
        try {
            $user = User::findOrFail($id);
            return response()->json(['user' => $user], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Utilisateur non trouvé.'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erreur lors de la récupération de l’utilisateur.'], 500);
        }
    }
}
