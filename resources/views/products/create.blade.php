<!DOCTYPE html>
<html>
    <head>
        <title>Lista de Productos</title>
        <link href="/css/app.css" rel="stylesheet">
        <script src="/js/app.js" defer></script>
    </head>
    <body id="create-form" class="create-form">
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
        <main>
            <div class="form">
                <h2 class="form__title">Sube tu producto</h2>
                <form action="{{ route('product.store') }}" id="form" method="POST" onsubmit="return validateForm()">
                @csrf
                    <div class="form__item">
                        <label for="name">Nombre:</label>
                        <input placeholder="Nombre del artículo" type="text" id="name" name="name" value="{{old('name')}}">
                    </div>
                    <div class="form__item">
                        <label for="price">Precio:</label>
                        <input type="text" placeholder="€€€" id="price" name="price" value="{{old('price')}}">
                    </div>
                    <div class="form__item">
                        <label for="description">Descripción:</label>
                        <textarea placeholder="Añade información necesaria" name="description" id="description" value="{{old('description')}}"></textarea>
                    </div>
                    <div class="form__select">
                        <div class="form__item">
                            <label for="category">Categoría:</label>
                            <select name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form__item">
                            <label for="state">Estado:</label>
                            <select name="state_id" id="state_id">
                                @foreach ($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button class="submit" type="submit">Crear Producto</button>
                </form>
            </div>
        </main>
        <footer class="main-footer">
            <p>Desarrollado por <a href="#">Ramón Sánchez</a></p>
        </footer>
    </body>
</html>