@extends('layouts/layout')
    @section('main-content')
    @php
        $bodyClass = Route::current()->uri === 'products/create' ? 'form-bckg' : '';
    @endphp
    <div class="form__container">
        <div class="form">
            <h2 class="form__title">Información del producto</h2>
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
                    <textarea placeholder="Añade información necesaria" name="description" id="description" value="{{old('description')}}" maxlength="255"></textarea>
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
    </div>
    <script>
        document.body.classList.add("{{ $bodyClass }}");
    </script>
    @endsection