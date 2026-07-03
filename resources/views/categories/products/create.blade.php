@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/categories/products/create.css') }}">
@endsection

@section('title', 'Create product')

@section('content')

<h1>Create product</h1>

<form method="POST" action="{{ route('categories.products.store', ['category' => $category]) }}" enctype="multipart/form-data">
    @csrf
    <label>
        Category
        <input type="text" name="category" value="{{ $category->name }}" disabled>
    </label>
    <label>
        Name
        <input type="text" name="name">
    </label>
    <label>
        Price
        <input type="number" name="price">
    </label>
    <label>
        Image
        <input type="file" name="image">
    </label>
    <label>
        Description
        <textarea name="description"></textarea>
    </label>
    <button type="submit">Add product</button>
</form>

@endsection
