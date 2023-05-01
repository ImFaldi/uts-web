<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function index(Request $request)
    {
        $portofolio = Portofolio::all();
        $totalPortofolio = Portofolio::count();
        return view('dashboard.dashboard', ['portofolio' => $portofolio, 'totalPortofolio' => $totalPortofolio]);
    }
}
