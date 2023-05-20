<form action="{{ route('store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <label for="price">Precio:</label>
        <input type="text" id="price" name="price">
    </div>
    <div>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
    </div>
    <div>
        <label for="category">Categoría:</label>
        <select name="category" id="category">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->id }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="state">Estado:</label>
        <select name="state" id="state">
            <option value="1">Activo</option>
            <option value="0">Inactivo</option>
        </select>
    </div>
    <button type="submit">Crear Producto</button>
</form>