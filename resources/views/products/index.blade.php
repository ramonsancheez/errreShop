<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link href="/public/css/app.css" rel="stylesheet">
</head>
<header>
    <h1>eRRRe</h1>
    <nav>
        <ul>
            <li>
                <a href="{{ route('index') }}">Productos</a>
            </li>
            <li>
                <a href="{{ route('create') }}">Subir Producto</a>
            </li>
        </ul>
    </nav>
</header>
<body >
    <body>
        <ul>
            @foreach($products as $product)
                <li>
                    <img src="https://placehold.co/400" title="{{$product->name}}" alt="{{ $product->name }}">
                    <p class="list-none">{{ $product }}</p>
                </li>
            @endforeach
        </ul>
    </body>
</body>
</html>
