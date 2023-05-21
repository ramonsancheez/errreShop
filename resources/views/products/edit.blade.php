<form action="{{ route('product.update', $product) }}" method="POST">
    @csrf @method('PATCH')
    <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" value="{{old('name', $product->name)}}">
    </div>
    <div>
        <label for="price">Precio:</label>
        <input type="text" id="price" name="price" value="{{old('price', $product->price)}}">
    </div>
    <div>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" cols="30" rows="10">{{old('description', $product->description)}}</textarea>
    </div>
    <div>
        <label for="category">Categoría:</label>
        <select name="category_id" id="category_id">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->id }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="state">Estado:</label>
        <select name="state" id="state">
            <option value="1">Nuevo</option>
            <option value="0">Malo</option>
            <option value="2">Usado</option>
        </select>
    </div>
    <button type="submit">Actualizar Producto</button>
</form>