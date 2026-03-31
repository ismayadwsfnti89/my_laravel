<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function product() {
        if(isset($_GET['search'])){
            $data['products'] = product::where('name', 'like', '%'. $_GET['search'] . '%')->get();
        } else {
            $data['products'] = product::all();
        }
        return view('admin.product.product', $data);
    }

    public function create(){
        return view('admin.product.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'stok' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string'
        ]);

        product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stok' => $request->stok,
            'category_id' =>$request->category_id,
            'description' =>$request->description
        ]);

        return redirect()->route('product.product')->with('success','product created succesfully');
    }
}

