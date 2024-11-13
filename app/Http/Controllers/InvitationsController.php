<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class InvitationsController extends Controller
{
      public function index()
    {
       
        return Inertia::render('Invitations/Index');

    }
    public function add()
    {
       
        return Inertia::render('Invitations/AcceptInvite');
    }
    public function valide()
    {
       
        return Inertia::render('Invitations/SendInvite');
    }

   
}
