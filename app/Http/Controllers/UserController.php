<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserNotification;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return Inertia::render('Users/Index', ['users' => $users]);
    }

    public function show(User $user)
    {
        return Inertia::render('Users/Show', ['user' => $user]);
    }

    public function notify(Request $request, User $user)
    {
        $message = $request->input('message');
        Notification::send($user, new UserNotification($message));
        return redirect()->route('users.index')->with('success', 'Notification sent successfully!');
    }
}