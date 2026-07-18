@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/categories/show.css') }}">
@endsection

@section('title', 'Category products')

@section('content')
<h1>Category products</h1>

<a href="{{ route('categories.index') }}" class="return-back-link">
    <svg viewBox="0 0 24 24" stroke="blue" width="20">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7071 4.29289C12.0976 4.68342 12.0976 5.31658 11.7071 5.70711L6.41421 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H6.41421L11.7071 18.2929C12.0976 18.6834 12.0976 19.3166 11.7071 19.7071C11.3166 20.0976 10.6834 20.0976 10.2929 19.7071L3.29289 12.7071C3.10536 12.5196 3 12.2652 3 12C3 11.7348 3.10536 11.4804 3.29289 11.2929L10.2929 4.29289C10.6834 3.90237 11.3166 3.90237 11.7071 4.29289Z" fill="#000000"/>
    </svg>
    Back to categories list
</a>

<p class="category">Category: <b>{{ $category->name }}</b></p>

<form method="GET" action="{{ route('categories.show', ['category' => $category]) }}" class="filter-form container">
    <label class="filter-form__label">
        Name
        <input type="text" name="name" class="filter-form__input" value="{{ request('name') }}">
    </label>
    <label class="filter-form__label">
        Price
        From <input type="number" name="price_from" class="filter-form__input" value="{{ request('price_from') }}">
        To <input type="number" name="price_to" class="filter-form__input"  value="{{ request('price_to') }}">
    </label>
    <label class="filter-form__label">
        Description
        <input type="text" name="description" class="filter-form__input" value="{{ request('description') }}">
    </label>
    <div class="filter-form__actions">
        <button type="submit" class="button">Filter</button>
        <a href="{{ route('categories.show', ['category' => $category]) }}" class="button button--danger">Clear</a>
    </div>
</form>

<div class="products">
@foreach ($category->products as $product)
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
