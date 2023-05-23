<!DOCTYPE html>
<html>
<head>
    <title>Producto {{$product->name}}</title>
    <link href="/css/app.css" rel="stylesheet">
</head>

<body id="product" class="product">
    <header class="main-header">
        <h1 class="main-header__title">eRRRe</h1>
        <nav>
            <ul class="main-header__nav">
                <li>
                    <a class="main-header__nav__link" href="{{ route('product.index') }}">Productos</a>
                </li>
                <li>
                    <a class="main-header__nav__link" href="{{ route('product.create') }}">Subir Producto</a>
                </li>
            </ul>
        </nav>
    </header>
    <main class="product-content">
        <div class="product-container">
            <img class="product__image" src="https://placehold.co/400/" title="{{$product->name}}" alt="{{ $product->name }}">
            <div class="product__info">
                <div class="product__info__price">{{$product->price}}€</div>
                <div class="product__info__title">{{$product->name}}</div>
                <div class="product__info__dif">
                    <div class="product__info__category">{{$product->category->name}}</div>
                    <div class="product__info__state">{{$product->state->name}}</div>
                </div>    
                <hr>
                <div class="product__info__description">{{$product->description}}</div>
                <div class="product__info__toDo">
                    <div class="product__info__edit"><a href="{{route('product.edit', $product)}}">Editar producto</a></div>
                    <div class="product__info__delete">
                        <form action="{{route('product.destroy', $product)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <a class="product__info__back"href="{{route('product.index')}}">Volver</a>
    </main>
</body>