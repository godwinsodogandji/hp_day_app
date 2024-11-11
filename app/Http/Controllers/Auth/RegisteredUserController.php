<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistrationMail;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|lowercase|email|max:255|unique:users',
        ]);

        // Générer un mot de passe aléatoire
        $password = bin2hex(random_bytes(4)); 

        // Créer l'utilisateur
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($password), 
        ]);

        // Événement d'enregistrement
        event(new Registered($user));

        // Envoyer un email avec les informations de connexion
        Mail::to($user->email)->send(new UserRegistrationMail($request->username, $password));

        // Redirection vers la page de connexion avec un message
        return redirect()->route('login')->with('status', 'Inscription réussie ! Un email a été envoyé avec votre mot de passe.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            logger('Authentification réussie pour : ' . $request->username);
            return redirect()->intended('dashboard');
        }

        logger('Échec de l\'authentification pour : ' . $request->username);
        return back()->withErrors([
            'username' => 'Les informations d\'identification fournies ne correspondent pas.',
        ]);
    }
}