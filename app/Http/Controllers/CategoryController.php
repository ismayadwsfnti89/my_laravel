<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index() {
        if(isset($_GET['search'])){
            $data['categories'] = Category::where('name', 'like', '%'. $_GET['search'] . '%')->get();
        } else {
            $data['categories'] = Category::all();
        }
        return view('admin.category.index', $data);
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories,name'
        ]);
        Category::create([
            'name' => $request->name
        ]);

        return redirect()->route('category.index')->with('success','Category created succesfully');
    }
}

