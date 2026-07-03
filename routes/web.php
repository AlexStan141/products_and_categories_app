<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('categories/{category}/products/create', function(Category $category){
    return view('categories.products.create', ['category' => $category]);
})->name('categories.products.create');

Route::post('categories/{category}', function(Request $request, Category $category){

    $data = $request->validate([
        'name' => 'required|string|min:3|max:10',
        'price' => 'required|integer|min:10|max:1000',
        'description' => 'required|string',
    ]);

    $image = $request->file('image');
    $path = $image->store('product_images', 'public');

    $product = new Product();
    $product->category_id = $category->id;
    $product->name = $data['name'];
    $product->price = $data['price'];
    $product->description = $data['description'];
    $product->image = '/storage/' . $path;

    $product->save();

    return redirect()->route('categories.show', ['category' => $category]);

})->name('categories.products.store');

Route::get('/categories/{category}/products/{product}/edit', function(Category $category, Product $product){
    //
});

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
