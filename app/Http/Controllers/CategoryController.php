<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //

    function create(Request $request)
    {
        $category = Category::create($request->all());
        return back()->with('success', 'Category added successfully');
    }

    function delete(Request $request)
    {
        $category = Category::find($request->id);
        $category->delete();

        if ($category) {
            return back()->with('success', 'Category deleted successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

    function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();

        if ($category) {
            return back()->with('success', 'Category updated successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

}
