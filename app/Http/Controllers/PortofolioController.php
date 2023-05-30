<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    //
    function index(Request $request)
    {
        $portofolio = Portofolio::all();
        
        return view('dashboard.table', compact('portofolio')); 
    }

    function create(Request $request)
    {
        $portofolio = Portofolio::create($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $portofolio->image = $request->file('image')->getClientOriginalName();
            $portofolio->save();

        }
        return back()->with('success', 'Portfolio added successfully');
    }

    function delete(Request $request)
    {
        $portofolio = Portofolio::find($request->id);
        $portofolio->delete();

        if ($portofolio) {
            return back()->with('success', 'Portfolio deleted successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function update(Request $request)
    {
        $portofolio = Portofolio::find($request->id);
        $portofolio->title = $request->title;
        $portofolio->description = $request->description;
        if ($request->hasFile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $portofolio->image = $request->file('image')->getClientOriginalName();
            $portofolio->save();
        }

        if ($portofolio) {
            return back()->with('success', 'Portfolio updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }


}
