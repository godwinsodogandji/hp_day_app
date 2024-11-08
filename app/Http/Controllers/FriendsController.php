<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function getFriends($user_id){
        // recupere user à travers son id 
        $user = User::findOrFail($user_id);

        // recup amis avec status accepted
        $friends = $user->friends()->where('status','accepted')->get()
        ->merge($user->friendOf()->where('status','accepted')->get());

        return response()->json($friends);//reponse en json
    }
}
