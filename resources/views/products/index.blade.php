<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="/css/app.css" rel="stylesheet">
</head>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<body id="home" class="home">
    <header class="main-header">
        <h1 class="main-header__title">eRRRe</h1>
        <nav>
            <ul class="main-header__nav">
                <li class="main-header__nav__item">
                    <a class="main-header__nav__link" href="{{ route('product.index') }}">Productos</a>
                </li>
                <li class="main-header__nav__item">
                    <a class="main-header__nav__link" href="{{ route('product.create') }}">Subir Producto</a>
                </li>
            </ul>
        </nav>
        <div class="filter">

        </div>
    </header>
    <main class="main-content">
        <h2 class="product__title">Lista de Productos</h2>
        <ul class="product__list">
            @foreach($products->reverse() as $product)
                <li class="product">
                    <a href="/products/{{$product->id}}">
                        <img class="product__image" src="https://placehold.co/170x225/" title="{{$product->name}}" alt="{{ $product->name }}">
                        <div class="product__name">{{ $product->name }}</div>
                        <div class="product__price">{{ $product->price }}€</div>
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
