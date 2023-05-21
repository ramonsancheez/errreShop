<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="/public/css/app.css" rel="stylesheet">
</head>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<body>
    <header>
        <h1>eRRRe</h1>
        <nav>
            <ul>
                <li>
                    <a href="{{ route('product.index') }}">Productos</a>
                </li>
                <li>
                    <a href="{{ route('product.create') }}">Subir Producto</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Lista de Productos</h2>
        <ul>
            @foreach($products as $product)
                <li class="product">
                    <a href="/products/{{$product->id}}">
                        <img src="https://placehold.co/400" title="{{$product->name}}" alt="{{ $product->name }}">
                        <p>{{ $product }}</p>
                    </a>
                    <div class="product__button">
                        <a href=" {{ route('product.edit', $product)}}">Ver</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </main>
    <footer>
        <p>Desarrollado por <a href="#">Ramón Sánchez</a></p>
    </footer>
</body>
</html>
