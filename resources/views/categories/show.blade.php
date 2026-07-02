@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/categories/show.css') }}">
@endsection

@section('title', 'Category products')

@section('content')
<h1>Category products</h1>
<p>Category: <b>{{ $category->name }}</b></p>

<div class="products">
@foreach ($products as $product)
    <div class="product">
        <img src="{{ $product->image }}" class="product__image">
        <div class="product__info">
            <p class="product__name">{{ $product->name }}</p>
            <p>{{ $product->price }}$</p>
            <p>{{ $product->description }}</p>
        </div>
    </div>
@endforeach
</div>

@endsection
