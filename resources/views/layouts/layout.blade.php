<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300&display=swap" rel="stylesheet">

    <meta property="og:title" content="ErrreShop">
    <meta property="og:description" content="Tienda de compra/venta de artículos de segunda mano">
</head>

<body onscroll="addScroll()" id="home" class="home {{ session('status') ? 'modal-open' : '' }}">
    @if (session('status'))
    <div class="alert__modal" id="alert-modal">
        <img class="close__modal" src="{{ asset('img/svg/close.svg') }}" alt="Close modal" title="Cierra" onclick="closeAlertModal()" />
        <div class="alert__modal-container">
            {{ session('status') }}
        </div>
    </div>
    @endif
    <header class="main-header">
        <a href="/products">
            <img class="main-header__logo" src="{{ asset('img/logos/logo.png') }}" alt="Logo" title="Logo" width="300px" />
        </a>
        <nav>
            <ul class="main-header__nav">
                <li class="main-header__nav__item">
                    <img src="{{ asset('img/socialmedia/wallet.svg') }}" alt="Tus puntos" title="Tus puntos" />
                    Puntos:{{ auth()->user()->points }}
                </li>
                <li class="main-header__nav__item">
                    <a class="main-header__nav__link" href="{{ route('product.index') }}">
                        <img src="{{ asset('img/socialmedia/shopping.svg') }}" alt="Productos" title="Productos" />
                        Productos
                    </a>
                </li>
                <li class="main-header__nav__item">
                    <a class="main-header__nav__link" href="{{ route('product.create') }}">
                        <img src="{{ asset('img/socialmedia/plus.svg') }}" alt="Subir Producto" title="Subir Producto" />
                        Subir Producto
                    </a>
                </li>
                @if(auth()->user()->role === 'admin')
                    <li class="main-header__nav__item">
                        <a class="main-header__nav__link" href="{{ route('admin.index') }}">
                            <img src="{{ asset('img/socialmedia/user.svg') }}" alt="Admin" title="Admin" />
                            Admin
                        </a>
                    </li>
                @else
                    <li class="main-header__nav__item">
                        <a class="main-header__nav__link" title="Mi perfil" href="{{ route('product.my-products') }}">
                            <img src="{{ asset('img/socialmedia/user.svg') }}" alt="Mi perfil" title="Mi perfil" />
                            {{ auth()->user()->name }}
                        </a>
                    </li>
                @endif
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
            @foreach(range(1, 9) as $categoryItem)
                <a href="{{ route('products.filter', $categoryItem) }}">
                    <img src="{{ asset('img/svg/category' . $categoryItem . '.svg') }}" alt="filtro" title="Categoría">
                </a>
            @endforeach
        </div>        
    @endif

    <main class="main-content">
        @yield('main-content')
    </main>

    <footer class="main-footer">
        <img class="main-header__logo" src="{{ asset('img/logos/logo.png') }}" alt="Logo" title="Logo" width="300px" />
        <div class="main-footer__columns">
            <div class="main-footer__links" target="_blank">
                <a href="{{ route('product.index') }}">Productos</a>
                <a href="{{ route('product.create') }}">Subir Producto</a>
                <a href="{{ route('product.my-products') }}">Mi perfil</a>
            </div>
            <div class="main-footer__socialmedia">
                Síguenos en nuestras redes sociales
                <div class="main-footer__socialmedia__icons">
                    <a href="https://www.facebook.com/" target="_blank">
                        <img src="{{ asset('img/socialmedia/facebook.svg') }}" alt="Facebook" title="Facebook" />
                    </a>
                    <a href="https://www.instagram.com/" target="_blank">
                        <img src="{{ asset('img/socialmedia/instagram.svg') }}" alt="Instagram" title="Instagram" />
                    </a>
                    <a href="https://www.twitter.com/">
                        <img src="{{ asset('img/socialmedia/twitter.svg') }}" alt="Twitter" title="Twitter" />
                    </a>
                </div>
            </div>
            <div class="main-footer__slogan">
                Renueva tu estilo, recicla tu gusto. Únete a nuestra app de compra venta y dale una segunda vida a lo que ya no usas
            </div>
        </div>
    </footer>
</body>
</html>
