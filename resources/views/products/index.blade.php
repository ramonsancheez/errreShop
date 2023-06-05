@extends('layouts/layout')
    @section('main-content')
        <h2 class="product__title">Compra y vende cosas de segunda mano</h2>
        <h4 class="product__subtitle">casi, casi, sin moverte del sofá</h4>
        @if(Route::currentRouteName() === 'product.index')
            <section>
                <h3 class="products__title">Productos recientes</h3>
                <div class="product__list">
                    <img class="carousel__arrow prev" src="{{ asset('img/svg/chvron-left.svg') }}" />
                    <div class="carousel">
                        <div class="carousel-list">
                            <div class="carousel-track" id="track">
                                <ul>
                                    @foreach ($recentProducts as $recentProduct)
                                        {{-- @if ($recentProduct->user_id !== Auth::id() && $recentProduct->buyer_id !== Auth::id()) --}}
                                            <li class="product">
                                                <a href="/products/{{$recentProduct->id}}">
                                                    <img class="product__image" src="https://placehold.co/170x225/" title="{{$recentProduct->name}}" alt="{{ $recentProduct->name }}">
                                                    <h2 class="product__name">{{ $recentProduct->name }}</h2>
                                                    <div class="product__price">{{ $recentProduct->price }}€</div>
                                                </a>
                                            </li>
                                        {{-- @endif --}}
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <img class="carousel__arrow next" src="{{ asset('img/svg/chvron-right.svg') }}" />
                </div>
            </section>
        <hr>
        @endif
        <section>
            <h3 class="products__title">Todos los productos</h3>
            <ul class="product__list" id="store-products">
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
        </section>
        <hr>
        <section>
            <div class="product-category">
            <h3 class="product__title"> Algunas categorías</h3>
            <div class="product-categories__mosaic">
                <div class="product-categories__item">
                    <a href="{{ route('products.filter', 1) }}">
                        <img src="{{ asset('img/png/bicis.png') }}" alt="Categoría" title="Categoría" width="600" height="350" />
                        <p>Bicicletas</p>
                    </a>
                </div>
                <div class="product-categories__item">
                    <a href="{{ route('products.filter', 2) }}">
                        <img src="{{ asset('img/png/electronica.png') }}" alt="Categoría" title="Categoría" width="600" height="350" />
                        <p>Electrónica</p>
                    </a>
                </div>
                <div class="product-categories__item">
                    <a href="{{ route('products.filter', 3) }}">
                        <img src="{{ asset('img/png/hogar.png') }}" alt="Categoría" title="Categoría" width="600" height="350" />
                        <p>Hogar</p>
                    </a>
                </div>
                <div class="product-categories__item">
                    <a href="{{ route('products.filter', 4) }}">
                        <img src="{{ asset('img/png/jueguetes.png') }}" alt="Categoría" title="Categoría" width="600" height="350" />
                        <p>Juguetes</p>
                    </a>
                </div>
            </div>
    @endsection
