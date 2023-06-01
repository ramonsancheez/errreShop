<!DOCTYPE html>
<html>
<head>
    <title>Producto {{$product->name}}</title>
    <link href="/css/app.css" rel="stylesheet">
    <script src="/js/app.js" defer></script>
</head>

<body id="product" class="product">
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
    <main class="main-content">
        <div class="product-container">
            <img class="product__image" src="https://placehold.co/400/" title="{{$product->name}}" alt="{{ $product->name }}">
            <div class="product__info">
                <div class="product__info__prices">
                    <div class="product__info__price">{{$product->price}}€</div>
                    <div class="product__info__discount" id="price__discounted">231€</div>
                </div>
                <div class="product__info__title">{{$product->name}}</div>
                <div class="product__info__dif">
                    <div class="product__info__category">{{$product->category->name}}</div>
                    <div class="product__info__state">{{$product->state->name}}</div>
                </div>    
                <hr>
                <div class="product__info__points">Puntos: {{$product->points}}</div>
                <div class="product__info__description">{{$product->description}}</div>
                <div class="product__info__toDo">
                    @if ($product->user_id != Auth::user()->id && $product->buyer_id == Auth::user()->id)
                        <div class="product__info__sold">Comprado a: {{ $product->user_id}}</div>
                    @elseif ($product->buyer_id != 0 && $product->user_id == Auth::user()->id)
                        <div class="product__info__sold">Vendido a: {{ $product->buyer_id }}</div>
                    @elseif ($product->user_id == Auth::user()->id && $product->buyer_id == 0)
                        <div class="product__info__edit"><a href="{{ route('product.edit', $product) }}">Editar producto</a></div>
                        <div class="product__info__delete">
                            <form action="{{ route('product.destroy', $product) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit">Eliminar</button>
                            </form>
                        </div>
                    @else
                        <form action="{{ route('product.purchase', $product) }}" method="POST">
                            @csrf
                            <button type="submit">Comprar producto</button>
                        </form>

                        <div class="checkbox">
                            ¿Desea usar sus puntos?<input type="checkbox" name="checkbox" id="checkbox" class="checkbox__custom" onclick="checkboxChecked()">
                        </div>
                        <script>
                            function checkboxChecked() {
                                var checkbox = document.getElementById("checkbox");
                                var priceElement = document.querySelector(".product__info__price");
                                if (checkbox.checked == true){
                                    priceElement.classList.add("crossed-out");
                                    document.getElementById("price__discounted").style.display = "block";
                                } else {
                                    priceElement.classList.remove("crossed-out");
                                    document.getElementById("price__discounted").style.display = "none";
                                }
                            }
                        </script>
                    @endif
                </div>
                
            </div>
        </div>
        
        <a class="product__info__back"href="{{route('product.index')}}">Volver</a>
    </main>

    <footer class="main-footer">
        <p>Desarrollado por <a href="#">Ramón Sánchez</a></p>
    </footer>
</body>