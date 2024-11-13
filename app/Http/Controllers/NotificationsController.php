<?php

namespace App\Http\Controllers;
use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        // Récupérer les notifications de l'utilisateur connecté
        $notifications = Notifications::with('user')->get()->map(function($notification) {
            return [
                'id' => $notification->id,
                'username' => $notification->user ? $notification->user->name : 'Inconnu',
                'message' => $notification->message,
                'is_read' => $notification->is_read,
                'time_ago' => $this->timeAgo($notification->created_at),
                'avatar_url' => $notification->user->avatar_url ?? '/path/to/default/avatar.jpg',
            ];
        });

        return inertia('Notifications', [
                     'notifications' => $notifications,
                 ]);


                 
    }
    private function timeAgo($timestamp)
    {
        return \Carbon\Carbon::parse($timestamp)->diffForHumans();
    }
}