<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SouhaiterJoyeuxAnniversaire extends Controller
{
    public function souhaiterJoyeuxAnniversaire($friendId)
    {
        return Inertia::render('SouhaiterJoyeuxAnniversaire', [
            'friendId' => $friendId, // Passez l'ID de l'ami si nécessaire
        ]);
    }
}
