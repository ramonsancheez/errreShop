<h1> {{$product->name}}</h1>
<p>{{$product->description}}</p>
<p>{{$product->price}}</p>
<p>{{$product->state}}</p>
<p>{{$product->category->name}}</p>

<ul>
    <li><a href="{{route('product.edit', $product)}}">Editar producto</a></li>
    <li>
        <form action="{{route('product.destroy', $product)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Eliminar</button>
        </form>
    </li>
</ul>

<a href="{{route('product.index')}}">Volver</a>