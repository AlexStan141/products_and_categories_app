@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/general.css') }}">
<link rel="stylesheet" href="{{ asset('css/categories/index.css') }}">
@endsection

@section('title', 'Categories')

@section('content')
<h1>Categories list</h1>

<div class="categories">
@foreach($categories as $category)
    <div class="category">
        <div class="category__info">
            <h2 class="category__name">{{ $category->name }}</h2>
            <p class="category__prices">From ${{ $category->min_price }} To ${{ $category->max_price }}</p>
        </div>
        <a href="#" class="category__view-link">View products</a>
    </div>
@endforeach
</div>

@endsection
