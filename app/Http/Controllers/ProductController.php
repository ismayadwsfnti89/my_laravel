<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request) {
        // Gunakan $request->search lebih baik daripada $_GET
        if($request->has('search')){
            $products = Product::where('name', 'like', '%'. $request->search . '%')->get();
        } else {
            $products = Product::all();
        }
        // Pastikan nama variabel di compact sesuai dengan nama variabel di atas
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        // Ambil data kategori supaya bisa dipilih di form
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'stok' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:3048'
        ]);

        // $filename = null;
        // if($request->hasFile('image')){
        //     // store() akan menghasilkan path seperti: products/namafile.jpg
        //     $filename = $request->file('image')->store('products', 'public');
        // }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
            'description' => $request->description,
            // 'image' => $filename // Pastikan ini masuk ke database
        ]);

        return redirect()->route('admin.products.index')->with('success','Product created successfully');
    }
    public function edit($id){
        try{
            $id = Crypt::decrypt($id);
        }catch (DecryptException $e){
            abort(404);
        }

        $products = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('products', 'categories'));

    }
    public function update(Request $request, $id)
    {
    try {
        $id = Crypt::decrypt($id);
    } catch (DecryptException $e) {
        abort(404);
    }
    $products = Product::findOrFail($id);
    $products->update([
        'name'        => $request->name,
        'price'       => $request->price,
        'stock'       => $request->stok, 
        'category_id' => $request->category_id,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Data Berhasil diupdate');
    }

}
