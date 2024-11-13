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

                 $notifications = Notifications::paginate(7);
                 return response()->json($notifications);
                 
    }
    private function timeAgo($timestamp)
    {
        return \Carbon\Carbon::parse($timestamp)->diffForHumans();
    }

    public function destroy($id)
    {
        $notification = Notifications::find($id);
        if (!$notification) {
            return response()->json(['message' => 'Notification introuvable.'], 404);
        }
    
        try {
            $notification->delete();
            return response()->json(['message' => 'Notification supprimée avec succès.']);
        } catch (\Exception $e) {
            \Log::error('Erreur lors de la suppression de la notification: ' . $e->getMessage());
            return response()->json(['message' => 'Erreur lors de la suppression de la notification.', 'error' => $e->getMessage()], 500);
        }
    }
}