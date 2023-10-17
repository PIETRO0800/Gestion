<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\AccueilController;

class AccueilController extends Controller
{
    public function accueil()
    {
        return view('home.accueil');
    }
    
}
