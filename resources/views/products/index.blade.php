@extends('layouts/layout')
    @section('main-content')
        <h2 class="product__title">Lista de Productos</h2>
        <ul class="product__list">
            @foreach($products->reverse() as $product)
                <li class="product">
                    <a href="/products/{{$product->id}}">
                        <img class="product__image" src="https://placehold.co/170x225/" title="{{$product->name}}" alt="{{ $product->name }}">
                        <h2 class="product__name">{{ $product->name }}</h2>
                        <div class="product__price">{{ $product->price }}€</div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endsection
