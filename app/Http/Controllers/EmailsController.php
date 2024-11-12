<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailsController extends Controller
{
      public function index()
    {
       
        return Inertia::render('Email/Index');

    }
    public function card1()
    {
       
        return Inertia::render('Email/Card1');
    }

    public function card2()
    {
       
        return Inertia::render('Email/Card2');
    }
    public function card3()
    {
       
        return Inertia::render('Email/Card3');
    }
    public function card4()
    {
       
        return Inertia::render('Email/Card4');
    }
    
}
