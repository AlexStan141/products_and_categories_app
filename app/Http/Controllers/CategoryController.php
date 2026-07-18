<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::latest();

        $name = $request->input('name');
        $min_price_from = $request->input('min_price_from');
        $min_price_to = $request->input('min_price_to');
        $max_price_from = $request->input('max_price_from');
        $max_price_to = $request->input('max_price_to');

        $categories = $categories->when(
            $name,
            fn($query, $name) => $query->name($name)
        );

        $categories = $categories->minPriceInterval($min_price_from, $min_price_to);
        $categories = $categories->maxPriceInterval($max_price_from, $max_price_to);

        $categories = $categories->get();

        return view('categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Request $request)
    {
        $name = $request->input('name');
        $price_from = $request->input('price_from');
        $price_to = $request->input('price_to');
        $description = $request->input('description');

        return view('categories.show', ['category' => $category->load([
                'products' => fn($q) => $q->when(
                    $name,
                    fn($query) => $query->name($name)
                )->price($price_from, $price_to)
                ->when(
                    $description,
                    fn($query) => $query->description($description)
                )
            ])
        ]);
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
