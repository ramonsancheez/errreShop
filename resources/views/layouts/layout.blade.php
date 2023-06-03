<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
</head>

<body onscroll="addScroll()" id="home" class="home">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <header class="main-header">
        <a href="/products">
            <h1 class="main-header__title">eRRRe</h1>
            <h3 class="main-header__subtitle">Recycle, reduce, reuse</h3>
        </a>
        <nav>
            <ul class="main-header__nav">
                <li class="main-header__nav__item">
                    <img src="{{ asset('img/socialmedia/wallet.svg') }}" alt="Tienda" title="Tienda" />
                    Puntos:{{ auth()->user()->points }}
                </li>
                <li class="main-header__nav__item">
                    <a class="main-header__nav__link" href="{{ route('product.index') }}">
                        <img src="{{ asset('img/socialmedia/shopping.svg') }}" alt="Tienda" title="Tienda" />
                        Productos
                    </a>
                </li>
                <li class="main-header__nav__item">
                    <a class="main-header__nav__link" href="{{ route('product.create') }}">
                        <img src="{{ asset('img/socialmedia/plus.svg') }}" alt="Subir Producto" title="Subir Producto" />
                        Subir Producto
                    </a>
                </li>
                <li class="main-header__nav__item">
                    <a class="main-header__nav__link" title="Mi perfil" href="{{ route('product.my-products') }}">
                        <img src="{{ asset('img/socialmedia/user.svg') }}" alt="Mi perfil" title="Mi perfil" />
                        {{ auth()->user()->name }}
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="{{ asset('img/socialmedia/log-out.svg') }}" alt="Cerrar sesión" title="Cerrar sesión">
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    @if(Route::currentRouteName() === 'product.index')
        <div class="search-wrapper">
            <label for="search"></label>
            <input placeholder="Busca tu producto" type="search" id="searchbox" onkeyup="search()">
        </div>

        <div class="filter">
            @foreach(range(1, 9) as $category)
                <a href="{{ route('products.filter', $category) }}">
                    <img src="{{ asset('img/svg/category' . $category . '.svg') }}" alt="filtro" title="Categoría">
                </a>
            @endforeach
        </div>
        
    @endif


    </div>

    <main class="main-content">
        @yield('main-content')
    </main>

    <footer class="main-footer">
        <p>Desarrollado por <a href="#">Ramón Sánchez</a></p>
        <a href="https://www.instagram.com/ramonsancheez_" target="_blank">
            <img src="{{ asset('img/socialmedia/instagram.svg') }}" alt="Compartir en Instagram">
        </a>
    </footer>
</body>
</html>
