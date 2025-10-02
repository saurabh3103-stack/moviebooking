<?php

namespace App\Http\Controllers;

use App\Models\MovieCategory;
use Illuminate\Http\Request;


class MovieCategoryController extends Controller
{
    
    public function index()
    {   
        $data['moviesCategory'] = MovieCategory::all();
        return view('admin.movies.moviesCategory',$data);
    }
    public function addmovieCategory(){
        return view('admin.movies.addmovieCategory');
    }

    


    public function store(Request $request)
    {
        $name=$request->name;
        if ($request->id) {
            $category = MovieCategory::find($request->id);
            $category->name = $name;
            $category->updated_at = now();
            if ($category->save()) {
                return redirect()->route('admin.addCategory')->with('success', 'Category updated successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to update category. Please try again.');
            }
        } else {
            $category = new MovieCategory();
            $category->name = $name;
            $category->created_at = now();
            $category->updated_at = now();
            if ($category->save()) {
                return redirect()->route('admin.addCategory')->with('success', 'Category added successfully!');
            } else {
                return redirect()->back()->with('error', 'Failed to add category. Please try again.');
            }
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id; 
        $data['category'] = MovieCategory::find($id);
        if ($data['category']) {
            return view('admin.movies.addmovieCategory',$data);
        } else {
            return redirect()->back()->with('error', 'Category not found!');
        }
    }
    public function deleteCategory(Request $request)
    {
        $id = $request->id; 
        $category = MovieCategory::find($id);
        if ($category) {
            $category->delete();
            return redirect()->back()->with('success', 'Category deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Category not found!');
        }
    }
}
