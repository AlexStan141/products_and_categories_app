<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        return view('categories.products.create', ['category' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request, Category $category)
    {
        $data = $request->validated();
        $imagePath = $data['image']->store('product_images', 'public');

        Product::create([
            'category_id' => $category->id,
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => '/storage/' . $imagePath
        ]);

        return view('categories.show', ['category' => $category]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
