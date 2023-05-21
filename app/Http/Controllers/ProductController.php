<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'description', 'state')->get();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
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
            'category_id' => 'required',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->state = $request->state;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        return to_route('product.index')->with('status', 'Product created successfully');

    }

    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        return view('products.edit', ['product' => $product], compact('categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'state' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->state = $request->state;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        return to_route('product.index')->with('status', 'Product updated successfully');


    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('status', 'Product deleted successfully');
    }
}

