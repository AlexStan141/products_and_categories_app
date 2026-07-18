@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
@endsection

@section('title', 'Create product')

@section('content')

<h1>Create product</h1>

<form method="POST" action="{{ route('categories.products.store', ['category' => $category]) }}" enctype="multipart/form-data">
    @csrf
    <label>
        Category
        <input type="text" name="category" value="{{ $category->name }}" disabled>
        @error('category')
            <p>{{ $message }}</p>
        @enderror
    </label>
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
