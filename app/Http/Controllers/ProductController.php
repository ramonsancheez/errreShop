<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('name', 'price', 'description', 'state')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'state' => 'required',
            'description' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->state = $request->state;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('products.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'state' => 'required',
            'description' => 'required',
        ]);

        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->state = $request->state;
        $product->description = $request->description;
        $product->save();

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index');
    }
}

