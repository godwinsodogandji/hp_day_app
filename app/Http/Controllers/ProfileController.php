<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): Response
    {
        return Inertia::render('Profile/Edit', [
            'mustVerifyEmail' => $request->user() instanceof MustVerifyEmail,
            'status' => session('status'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
   public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // Remplir l'utilisateur avec les données validées
    $user->fill($request->validated());

    // Vérifier si l'email a changé
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;

        // Optionnel : Envoyer une notification ou un email de vérification
        // Notification::send($user, new EmailChangedNotification());
    }

    // Tenter de sauvegarder les modifications
    try {
        $user->save();
    } catch (\Exception $e) {
        return Redirect::route('profile.edit')->withErrors(['error' => 'Une erreur est survenue lors de la mise à jour du profil.']);
    }

    return Redirect::route('profile.edit')->with('status', 'Profil mis à jour avec succès.');
}

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/')->with('status', 'Votre compte a été supprimé avec succès.');
    }
}