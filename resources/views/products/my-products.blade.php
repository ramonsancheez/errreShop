<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
</head>
<body>
    <header class="main-header">
        <a href="/products">
            <h1 class="main-header__title">eRRRe</h1>
            <h3 class="main-header__subtitle">Recycle, reduce, reuse</h3>
        </a>
        <nav>
            <ul class="main-header__nav">
                <li class="main-header__nav__item">
                    <a id="link1" class="main-header__nav__link" href="{{ route('product.index') }}">Productos</a>
                </li>
                <li class="main-header__nav__item">
                    <a id="link2" class="main-header__nav__link" href="{{ route('product.create') }}">Subir Producto</a>
                </li>
                <li class="main-header__nav__item">
                    <a id="link1" class="main-header__nav__link" href="{{ route('product.my-products') }}">Mis productos</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log Out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <main class="main-content">        
        <h1 class="product__title">Mis productos</h1>
        <hr>
        <ul class="product__list">
            @foreach ($products as $product)
                <li class="product">
                    <a href="/products/{{$product->id}}">
                        <img class="product__image" src="https://placehold.co/225x300/" title="{{$product->name}}" alt="{{ $product->name }}">
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
                        <img class="product__image" src="https://placehold.co/225x300/" title="{{$purchasedProduct->name}}" alt="{{ $purchasedProduct->name }}">
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
                        <img class="product__image" src="https://placehold.co/225x300/" title="{{$soldProduct->name}}" alt="{{ $soldProduct->name }}">
                        <h2 class="product__name">{{ $soldProduct->name }}</h2>
                        <div class="product__description">{{ $soldProduct->description }}</div>
                        <div class="product__price">{{ $soldProduct->price }}€</div>
                    </a>
                </li>
            @endforeach
        </ul>
    </main>
    <footer class="main-footer">
        <p>Desarrollado por <a href="#">Ramón Sánchez</a></p>
    </footer>
</body>
</html>