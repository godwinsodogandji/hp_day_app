<?php

use App\Http\Controllers\FriendsController;
use App\Http\Controllers\ProfileController;
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

// route user 
Route::get('/users',[UserController::class,'getAllUsers']);
Route::get('/users/{id}',[UserController::class,'getUserById']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/users/{user_id}/friends', [FriendsController::class, 'getFriends']);//recuperer les amis d'un user donné
Route::get('/users/{user_id}/suggestions', [FriendsController::class, 'suggestFriends']);//suggestions d'amis
Route::get('/users/{user_id}/friends/{friend_id}', [FriendsController::class, 'searchFriends']);//recherch damis specifique
Route::post('/users/{user_id}/friends/{friend_id}', [FriendsController::class, 'sendFriendRequest']);//envoi de demande d'amitié
Route::put('/users/{user_id}/friends/{friend_id}/accept', [FriendsController::class, 'acceptFriendRequest']); // Accepter une demande d'amitié


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
