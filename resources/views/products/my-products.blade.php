@extends('layouts/layout')
    @section('main-content')       
        <h1 class="product__title">Mis productos disponibles</h1>
        <hr>
        <ul class="product__list">
            @foreach ($products as $product)
                <li class="product">
                    <a href="/products/{{$product->id}}">
                        <img class="product__image" src="{{$product->image_url}}" title="{{$product->name}}" alt="{{ $product->name }}" width="200" height="200">
                        <h2 class="product__name">{{ $product->name }}</h2>
                        <div class="product__description">{{ $product->description }}</div>
                        <div class="product__price">{{ $product->price }}€</div>
                    </a>
                </li>
            @endforeach
        </ul>
        <hr>
        <h2 class="product__title">Mis compras</h2>
        <hr>
        <ul class="product__list">
            @foreach ($purchasedProducts as $purchasedProduct)
                <li class="product">
                    <a href="/products/{{$purchasedProduct->id}}">
                        <img class="product__image" src="{{$purchasedProduct->image_url}}" title="{{$purchasedProduct->name}}" alt="{{ $purchasedProduct->name }}">
                        <h2 class="product__name">{{ $purchasedProduct->name }}</h2>
                        <div class="product__description">{{ $purchasedProduct->description }}</div>
                        <div class="product__price">{{ $purchasedProduct->price }}€</div>
                    </a>
                </li>
            @endforeach
        </ul>
        <hr>
        <h2 class="product__title">Mis ventas</h2>
        <hr>
        <ul class="product__list">
            @foreach ($soldProducts as $soldProduct)
                <li class="product">
                    <a href="/products/{{$soldProduct->id}}">
                        <img class="product__image" src="{{$soldProduct->image_url}}" title="{{$soldProduct->name}}" alt="{{ $soldProduct->name }}">
                        <h2 class="product__name">{{ $soldProduct->name }}</h2>
                        <div class="product__description">{{ $soldProduct->description }}</div>
                        <div class="product__price">{{ $soldProduct->price }}€</div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endsection