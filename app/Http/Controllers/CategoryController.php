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

        return redirect()->route('admin.category.index')->with('success','Category created succesfully');
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('success','Category delete succesfully');
    }
    public function edit($id){
        $data['category'] = Category::findOrFail($id);
        return view('admin.category.edit',$data);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' -> $request->name
                           ])
        return redirect()->route('admin.category.index')->with('success','Category updated successfully.');
    }
}

