<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class CategoryController extends Controller
{
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

        return redirect()->route('admin.category.index')->with('success','Category created successfully');
    }

    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();


        return redirect()->route('admin.category.index')->with('success','Category deleted successfully');
    }

    public function edit($id){
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        
        $data['category'] = Category::findOrFail($id);
        return view('admin.category.edit', $data);
    }

    public function update(Request $request, $id) {
         try {
             $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
             abort(404);
        }
        $request->validate([
            'name' => 'required|unique:categories,name,' . $id
        ]);

        Category::where('id', $id)->update([
            'name' => $request->name 
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Category updated successfully.');

    }
}
