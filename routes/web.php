<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Routes pour le profil
Route::get('/profile', [ProfilesController::class, 'edit'])->name('profile.edit'); // Afficher le formulaire d'édition du profil
Route::patch('/profile', [ProfilesController::class, 'update'])->name('profile.update'); // Mettre à jour le profil
Route::delete('/profile', [ProfilesController::class, 'destroy'])->name('profile.destroy'); // Supprimer le profil

// Routes pour l'utilisateur
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users/{user}/notify', [UserController::class, 'notify'])->name('users.notify');

// Routes pour l'email
Route::get('/users/{user}/email', [EmailsController::class, 'create'])->name('email.create'); // Afficher le formulaire d'envoi
Route::post('/users/{user}/email', [EmailsController::class, 'send'])->name('email.send'); // Envoyer l'email




require __DIR__ . '/auth.php';
