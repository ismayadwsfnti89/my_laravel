<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
<<<<<<< HEAD
use Illuminate\Contracts\Encryption\DecryptException;
=======
>>>>>>> 7010b9ee264acccee7a4bc5046c84b0addfd78be

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

<<<<<<< HEAD
        return redirect()->route('admin.category.index')->with('success','Category created successfully');
    }

=======
        return redirect()->route('admin.category.index')->with('success','Category created succesfully');
    }
>>>>>>> 7010b9ee264acccee7a4bc5046c84b0addfd78be
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

<<<<<<< HEAD
        return redirect()->route('admin.category.index')->with('success','Category deleted successfully');
    }

    // FUNGSI EDIT INI WAJIB ADA
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
=======
        return redirect()->route('admin.category.index')->with('success','Category delete succesfully');
    }
    public function edit($id){
         try{
            $id = Crypt::decrypt($id);
        }catch (DecryptException $e){
            abort(404);
        }
        $data['category'] = Category::findOrFail($id);
        return view('admin.category.edit',$data);
    }
    public function update(Request $request, $id){
        $request->validate([
            'name' -> $request->name
                           ])
        return redirect()->route('admin.category.index')->with('success','Category updated successfully.');
>>>>>>> 7010b9ee264acccee7a4bc5046c84b0addfd78be
    }
}
