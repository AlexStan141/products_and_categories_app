<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $query = $request->query();
        $clean = array_filter($query, fn($v) => $v !== null && $v !== '');
        if ($clean !== $query) {
            return redirect()->route('categories.index', $clean);
        }

        if(in_array('name', array_keys($clean))){
            $categories = Category::where('name', 'like',  '%' . $clean['name'] . '%');
        }

        if(in_array('min_price_from', array_keys($clean))){
            $categories = !isset($categories) ? Category::where('min_price', '>=', $clean['min_price_from'])
                    : $categories->where('min_price', '>=', $clean['min_price_from']);
        }

        if(in_array('min_price_to', array_keys($clean))){
            $categories = !isset($categories) ? Category::where('min_price', '<=', $clean['min_price_to'])
                    : $categories->where('min_price', '<=', $clean['min_price_to']);
        }

        if(in_array('max_price_from', array_keys($clean))){
            $categories = !isset($categories) ? Category::where('max_price', '>=', $clean['max_price_from'])
                    : $categories->where('max_price', '>=', $clean['max_price_from']);
        }

        if(in_array('max_price_to', array_keys($clean))){
            $categories = !isset($categories) ? Category::where('max_price', '<=', $clean['max_price_to'])
                    : $categories->where('max_price', '<=', $clean['max_price_to']);
        }

        $categories = isset($categories) ? $categories->get() : Category::all();

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
