<?php

use App\Http\Controllers\AjouterAmisController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\BirthdaysController;
use App\Http\Controllers\EmailsController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\InvitationsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\SouhaiterJoyeuxAnniversaire;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->middleware('guest'); // Protéger la page d'accueil pour les utilisateurs non authentifiés

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->middleware('guest')->name('register'); // Protéger la route d'inscription

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->middleware('guest')->name('login'); // Protéger la route de connexion


// Récupérer les anniversaires à venir (API ou action backend)
Route::get('/upcoming-birthdays-data', [BirthdayController::class, 'getUpcomingBirthdays']);

// Afficher les anniversaires à venir (pour la vue)
Route::get('/upcoming-birthdays', [BirthdayController::class, 'showUpcomingBirthdays'])->name('upcoming-birthdays');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/mail', [EmailsController::class, 'index'])->name('mail');

Route::get('/card1', [EmailsController::class, 'card1']);
Route::get('/card2', [EmailsController::class, 'card2']);
Route::get('/card3', [EmailsController::class, 'card3']);
Route::get('/card4', [EmailsController::class, 'card4']);



Route::get('/invitation', [InvitationsController::class, 'index']);

Route::get('/add', [InvitationsController::class, 'add']);
Route::get('/valide', [InvitationsController::class, 'valide']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::get('/ajoutdesamis', [AjouterAmisController::class, 'index'])->name('ajoutdesamis');
Route::get('/friends', [FriendsController::class, 'index'])->name('friends');
Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications');
Route::get('/upcoming-birthdays', [BirthdaysController::class, 'index'])->name('upcoming.birthdays');

// Routes pour l'utilisateur
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::post('/users/{user}/notify', [UserController::class, 'notify'])->name('users.notify');

// Routes pour l'email
Route::get('/users/{user}/email', [EmailsController::class, 'create'])->name('email.create'); // Afficher le formulaire d'envoi
Route::post('/users/{user}/email', [EmailsController::class, 'send'])->name('email.send'); // Envoyer l'email

Route::get('/souhaiter/{friendId}', [SouhaiterJoyeuxAnniversaire::class, 'souhaiterJoyeuxAnniversaire'])
    ->name('souhaiter.joyeux-anniversaire');


require __DIR__ . '/auth.php';
