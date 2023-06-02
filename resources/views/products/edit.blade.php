@extends('layouts/layout')
    @section('main-content')
            <div class="form">
                <h2 class="form__title">Actualiza tu producto</h2>
                <form action="{{ route('product.update', $product) }}" method="POST" onsubmit="return validateForm()">
                    @csrf @method('PATCH')
                    <div class="form__item">
                        <label for="name">Nombre:</label>
                        <input type="text" id="name" name="name" value="{{old('name', $product->name)}}">
                    </div>
                    <div class="form__item">
                        <label for="price">Precio:</label>
                        <input type="text" id="price" name="price" value="{{old('price', $product->price)}}">
                    </div>
                    <div class="form__item">
                        <label for="description">Descripción:</label>
                        <textarea name="description" id="description" cols="30" rows="10">{{old('description', $product->description)}}</textarea>
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
                    <button class="submit" type="submit">Actualizar Producto</button>
                </form>
            </div>
    @endsection