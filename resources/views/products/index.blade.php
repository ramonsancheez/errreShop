<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300&display=swap" rel="stylesheet">
</head>

<body onscroll="addScroll()" id="home" class="home">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <header class="main-header">
        <h1 class="main-header__title">eRRRe</h1>
        <h3 class="main-header__subtitle">Recycle, reduce, reuse</h3>
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
        
    </header>

    <div class="search-wrapper">
        <label for="search"></label>
        <input placeholder="Busca tu producto" type="search" id="searchbox" onkeyup="search()">
    </div>

    </div>
    <main class="main-content">
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
    </main>
    <footer class="main-footer">
        <p>Desarrollado por <a href="#">Ramón Sánchez</a></p>
    </footer>
</body>
</html>
