<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\State;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name', 'price', 'description','points', 'category_id', 'state_id')->where('buyer_id', 0)->get();
        return view('products.index', ['products' => $products]);
    }

    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }
    
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $states = State::select('id', 'name')->get();
        return view('products.create', compact('categories', 'states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'state_id' => 'required',
        ]);

        $product = new Product();
        $user = Auth::user();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->state_id = $request->state_id;
        $product->points = rand(1, 10);
        $product->description = $request->description;
        $product->user_id = $user->id;
        $product->category_id = $request->category_id;
        $product->save();

        return to_route('product.index')->with('status', 'Product created successfully');

    }

    public function edit(Product $product)
    {
        $categories = Category::select('id', 'name')->get();
        $states = State::select('id', 'name')->get();
        return view('products.edit', ['product' => $product], compact('categories', 'states'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'state_id' => 'required',
        ]);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->state_id = $request->state_id;
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

    public function myProducts()
    {
        $user = Auth::user();
        $products = Product::select('id', 'name', 'price', 'description', 'category_id', 'state_id')->where('buyer_id', 0)->where('user_id', $user->id)->get();
        $purchasedProducts = Product::select('id', 'name', 'price', 'description', 'category_id', 'state_id')->where('buyer_id', $user->id)->get();
        $soldProducts = Product::select('id', 'name', 'price', 'description', 'category_id', 'state_id')->where('user_id', $user->id)->where('buyer_id', '!=', 0)->get();
        return view('products.my-products', ['products' => $products, 'purchasedProducts' => $purchasedProducts, 'soldProducts' => $soldProducts]);
    }

    public function purchase(Product $product)
    {
        $user = Auth::user();
        $product->buyer_id = $user->id;
        $product->save();

        $transaction = new Transaction();
        $transaction->user_id = $product->user_id;
        $transaction->buyer_id = $user->id;
        $transaction->points = $product->points;
        $transaction->product_id = $product->id;
        $transaction->price = $product->price;
        $transaction->save();
        
        return redirect()->route('product.index')->with('status', 'Product purchased successfully');
    }
}

