@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/categories/show.css') }}">
@endsection

@section('title', 'Category products')

@section('content')
<h1>Category products</h1>

<a href="{{ route('categories.index') }}">Back to categories list</a>

<p>Category: <b>{{ $category->name }}</b></p>

<div class="products">
@foreach ($products as $product)
    <div class="product">
        <img src="{{ $product->image }}" class="product__image">
        <div class="product__info">
            <p class="product__name">{{ $product->name }}</p>
            <p>{{ $product->price }}$</p>
            <p>{{ $product->description }}</p>
            <div class="product__actions">
                <a href="#" class="button button--success">Edit</a>
                <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button button--danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endforeach
</div>

<a href="{{ route('categories.products.create', ['category' => $category]) }}" class="button button--success button--bottom">Add product</a>

@endsection
