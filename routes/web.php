<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class, [
    'names' => 'product',
    'parameters' => ['products' => 'product']
]);

Route::resource('admin', AdminController::class, [
    'names' => 'admin',
    'parameters' => ['admin' => 'admin']
]);

Route::get('/products/filter/{categoryId}', [ProductController::class, 'filterByCategory'])->name('products.filter');
Route::post('products/{product}/purchase', [ProductController::class, 'purchase'])->name('product.purchase');
Route::get('/my-products', [ProductController::class, 'myProducts'])->name('product.my-products');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

require __DIR__.'/auth.php';