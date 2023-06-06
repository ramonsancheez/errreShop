<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\State;
use App\Models\User;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('id', 'name','image_url','is_active', 'price', 'description','points', 'category_id','created_at', 'state_id')->where('buyer_id', 0)->get();
        $recentProducts = Product::orderBy('created_at', 'desc')->take(10)->get();
        
        $user = Auth::user();
        $products_image = Product::with('category')->get();
        return view('products.index', ['products' => $products, 'recentProducts' => $recentProducts, 'products_image' => $products_image, 'user' => $user]);
    }


    public function show(Request $request,  Product $product)
    {
        $user = Auth::user();
        $productUrl = $request->url();
        return view('products.show', ['product' => $product, 'productUrl' => $productUrl, 'user' => $user]);
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
        $randImg = rand(1, 5);
        $product->image_url = "/img/categories/{$request->category_id}/{$randImg}.jpg";
        $product->save();

        return to_route('product.index')->with('status', 'Tu producto ' . $product->name . ' ya está a la venta por un precio de ' . $product->price . '€');

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
        $randImg = rand(1, 4);
        $product->image_url = "/img/categories/{$request->category_id}/{$randImg}.jpg";
        $product->save();

        return to_route('product.index')->with('status', 'Estás de enhorabuena, tu producto ' . $product->name . ' ha sido actualizado con éxito');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('status', 'Oh vaya, has eliminado el producto ' . $product->name . ' con éxito');
    }    

    public function myProducts()
    {
        $user = Auth::user();
        $products = Product::select('id', 'name', 'price','image_url', 'description', 'category_id', 'state_id')->where('buyer_id', 0)->where('user_id', $user->id)->get();
        $purchasedProducts = Product::select('id', 'name', 'price','image_url', 'description', 'category_id', 'state_id')->where('buyer_id', $user->id)->get();
        $soldProducts = Product::select('id', 'name', 'price', 'description','image_url', 'category_id', 'state_id')->where('user_id', $user->id)->where('buyer_id', '!=', 0)->get();
        return view('products.my-products', ['products' => $products, 'purchasedProducts' => $purchasedProducts, 'soldProducts' => $soldProducts]);
    }

    public function filterByCategory($category)
    {
        
        $products = Product::select('id', 'name', 'price', 'description','image_url', 'category_id', 'state_id')->where('category_id', $category)->where('buyer_id', 0)->get();
        $recentProducts = Product::orderBy('created_at', 'desc')->take(10)->get();
        $user = Auth::user();
        $products_image = Product::with('category')->get();
        return view('products.index', ['products' => $products, 'recentProducts' => $recentProducts, 'products_image' => $products_image, 'user' => $user]);
    }

    public function purchase(Request $request, Product $product)
    {
        $user = Auth::user();
        $product->buyer_id = $user->id;
        $product->is_active = false;
        $product->save();

        $buyer = Auth::user();
        if ($request->input('checkbox') == 1) {
            $buyer->points = 0;
        } else {
            $buyer->points += $product->points;
        }
        $buyer->save();

        $seller = $product->user;
        $seller->points += $product->points;
        $seller->save();

        $profitPercentage = env('PROFIT_PERCENTAGE');
        $transaction = new Transaction();
        $transaction->user_id = $product->user_id;
        $transaction->buyer_id = $user->id;
        $transaction->points = $product->points;
        $transaction->product_id = $product->id;
        $transaction->profit_seller = $product->price-(1 - $profitPercentage);
        $transaction->profit_company = $product->price*$profitPercentage;
        $transaction->total_price = $product->price;
        $transaction->save();

        
        return redirect()->route('product.index')->with('status', 'Enhorabuena, has comprado el producto ' . $product->name . ' por ' . $product->price . '€');
    }
}

