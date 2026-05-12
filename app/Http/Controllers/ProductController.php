<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    // Index
    public function index(Request $request)
    {

        $product = Product::query();

        if ($request->search) {
            $product->where('name', 'like', '%' . $request->search . '%');
        }

        return view('admin.product.index', [
            'product' => $product->get()
        ]);
        // $products = $request->search
        //     ? Product::where('name', 'like','%' . $request->search . '%')->get()
        //     : Product::all();

        // return view('admin.products.index', compact('products'));
    }

    // Create
    public function create()
    {
        $categories = Category::all();
        $product = new Product();
        return view('admin.product.create', compact('categories', 'product'));
    }

    // Store
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:products,name',
        'price' => 'required|numeric',
        'stok' => 'required|numeric', // pakai stok
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:3084'
    ]);

    $imagename = $request->hasFile('image')
        ? $request->file('image')->store('products', 'public')
        : null;

    Product::create([
       'name' => $request->name,
       'price' => $request->price,
       'stok' => $request->stok, // AMBIL DARI $request->stok
       'category_id' => $request->category_id,
       'description' => $request->description,
       'image' => $imagename
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Berhasil!');
}

    // Edit
    public function edit($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    // Update
   // Fungsi Update
public function update(Request $request, $id)
{
    try {
        $id = Crypt::decrypt($id);
    } catch (DecryptException $e) {
        abort(404);
    }

    $request->validate([
        'name' => 'required|unique:products,name,' . $id,
        'price' => 'required|numeric',
        'stok' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:3084'
    ]);

    $product = Product::findOrFail($id);
    $imageName = $product->image;

    if ($request->hasFile('image')) {
        if($imageName && Storage::disk('public')->exists($imageName)) {
            Storage::disk('public')->delete($imageName);
        }
        $imageName = $request->file('image')->store('products', 'public');
    }

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'stok' => $request->stok, // Sudah benar pakai 'stok'
        'category_id' => $request->category_id,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return redirect()->route('admin.products.index') // Tambahkan 's'
        ->with('success', 'Product updated successfully');
}

// Fungsi Destroy
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $product = Product::findOrFail($id);

        // Hapus foto kalau ada
        if($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index') // Tambahkan 's'
            ->with('success', 'Product deleted successfully');
    }

}
