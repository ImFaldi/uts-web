<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPortofolioRequest;
use App\Http\Requests\DeletePortofolioRequest;
use App\Http\Requests\UpdatePortofolioRequest;
use App\Models\Portofolio;

class ApiController extends Controller
{
    public function index()
    {
        $data = Portofolio::all();
        return response()->json([
            'success' => true,
            'message' => 'List Data Portofolio',
            'data' => $data
        ], 200);
    }

    public function create(AddPortofolioRequest $request)
    {
        $portofolio = Portofolio::create($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $portofolio->image = $request->file('image')->getClientOriginalName();
            $portofolio->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Portofolio added successfully',
            'data' => $portofolio
        ], 200);
    }

    public function update(UpdatePortofolioRequest $request)
    {
        $portofolio = Portofolio::find($request->id);
        $portofolio->title = $request->title;
        $portofolio->description = $request->description;
        if ($request->hasFile('image')) {
            $request->file('image')->move('images/', $request->file('image')->getClientOriginalName());
            $portofolio->image = $request->file('image')->getClientOriginalName();
            $portofolio->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Portofolio updated successfully',
            'data' => $portofolio
        ], 200);
    }

    public function delete(DeletePortofolioRequest $request)
    {
        $portofolio = Portofolio::find($request->id);
        $portofolio->delete();

        if ($portofolio) {
            return response()->json([
                'success' => true,
                'message' => 'Portofolio deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong',
            ], 400);
        }
    }
}
