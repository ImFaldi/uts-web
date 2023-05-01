<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\User;
use Illuminate\Http\Request;

class LandingPageConroller extends Controller
{
    //
    function index(Request $request)
    {
        $portofolio = Portofolio::all();
        $user = User::all();
        return view('landingPage', ['portofolio' => $portofolio, 'user' => $user]);
    }

}