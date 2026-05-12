<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $product = Product::all();
        return view('home', compact('categories', 'product'));
    }

    public function detail($id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            abort(404);
        }

        $product = Product::findOrFail($id);
        return view('detail', compact('product'));
    }
}
