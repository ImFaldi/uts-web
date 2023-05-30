<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use App\Models\Category;


class DashboardController extends Controller
{
    //
    function index(Request $request)
    {
        $portofolio = Portofolio::all();
        $totalPortofolio = Portofolio::count();
        $totalCategory = Category::count();
        return view('dashboard.dashboard', ['portofolio' => $portofolio, 'totalPortofolio' => $totalPortofolio], ['totalCategory' => $totalCategory]);
    }
}
