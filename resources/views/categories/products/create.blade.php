@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/categories/products/create.css') }}">
@endsection

@section('title', 'Create product')

@section('content')

<h1>Create product</h1>

<p>{{ session()->has('price_range_error') }}</p>

<form method="POST" action="{{ route('categories.products.store', ['category' => $category]) }}" enctype="multipart/form-data">
    @csrf

    <input type="hidden" name="category_id" value="{{ $category->id }}">

    <div class="category-field">
        <label>
            Category
            <input type="text" name="category" value="{{ $category->name }}" disabled>
            @error('category')
                <p>{{ $message }}</p>
            @enderror
        </label>
        <p class="category__info">{{ $category->min_price }}$ - {{ $category->max_price }}$</p>
    </div>

    <label>
        Name
        <input type="text" name="name">
        @error('name')
            <p>{{ $message }}</p>
        @enderror
    </label>
    <label>
        Price
        <input type="number" name="price">
        @error('price')
            <p>{{ $message }}</p>
        @enderror
    </label>
    <label>
        Image
        <input type="file" name="image">
        @error('image')
            <p>{{ $message }}</p>
        @enderror
    </label>
    <label>
        Description
        <textarea name="description"></textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </label>
    <button type="submit" class="button button--success">Add product</button>
</form>

@endsection
