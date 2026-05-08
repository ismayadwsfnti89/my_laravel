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
    public function index(Request $request)
    {
        $search = $request->input('search');

    if ($search) {
        $products = Product::where('name', 'like', '%' . $search . '%')->get();
    } else {
        $products = Product::all();
    }

    return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:products,name',
            'price' => 'required|numeric',
            'stok' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:3048'
        ]);

        if ($request->hasFile('image')) {
            $imagename = $request->file('image')->store('products', 'public');
        } else {
            $imagename = null;
        }

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imagename
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully');
    }

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
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:3048'
        ]);

        $product = Product::findOrFail($id);
        $filePath = $product->image;

        if ($request->hasFile('image')) {
            if ($filePath && Storage::disk('public')->exists($filePath)) {
                Storage::disk('public')->delete($filePath);
            }

            $imagename = $request->file('image')->store('products', 'public');
        } else {
            $imagename = $filePath;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'stok' => $request->stok,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $imagename
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }

        $product = Product::findOrFail($id);

        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
    }
}
