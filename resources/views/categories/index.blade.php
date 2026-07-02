@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/categories/index.css') }}">
@endsection

@section('title', 'Categories')

@section('content')
<h1>Categories list</h1>

<form method="GET" action="{{ route('categories.index') }}" class="filter-form container">
    <label class="filter-form__label">
        Name
        <input type="text" name="name" class="filter-form__input">
    </label>
    <label class="filter-form__label">
        Min price
        From <input type="number" name="min_price_from" class="filter-form__input">
        To <input type="number" name="min_price_to" class="filter-form__input">
    </label>
    <label class="filter-form__label">
        Max price
        From <input type="number" name="max_price_from" class="filter-form__input">
        To <input type="number" name="max_price_to" class="filter-form__input">
    </label>
    <button type="submit" class="button">Filter</button>
</form>

<div class="categories">
@foreach($categories as $category)
    <div class="category">
        <div class="category__info">
            <h2 class="category__name">{{ $category->name }}</h2>
            <p class="category__prices">From ${{ $category->min_price }} To ${{ $category->max_price }}</p>
        </div>
        <a href="#" class="button">View products</a>
    </div>
@endforeach
</div>

@endsection
