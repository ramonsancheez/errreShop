@extends('layouts/layout')
    @section('main-content') 
        <div class="product-container">
            <div class="product__image__container">
                <img class="product__image" src="{{$product->image_url}}" title="{{ $product->name }}"   alt="{{ $product->name }}" width="400" height="400">
                <div class="product__image__points">{{$product->points}} PTS</div>
            </div>
                <div class="product__info">
                <div class="product__info__prices">
                    <div class="product__info__price">{{$product->price}}€</div>
                    <div class="product__info__discount" id="price__discounted">
                        {{ $product->price - Auth::user()->points/100 }}€
                    </div>
                </div>
                <div class="product__info__title">{{$product->name}}</div>
                <div class="product__info__dif">
                    <div class="product__info__category">{{$product->category->name}}</div>
                    <div class="product__info__state">{{$product->state->name}}</div>
                </div>    
                <hr>
                
                <div class="product__info__description">{{$product->description}}</div>
                <div class="product__info__toDo">
                    @if($user->role == "admin")
                        <div class="product__info__delete">
                            <form action="{{ route('product.destroy', $product) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit">Eliminar</button>
                            </form>
                        </div>
                    @elseif ($product->user_id != Auth::user()->id && $product->buyer_id == Auth::user()->id)
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
                        <input type="hidden" id="purchaseButton" name="checkbox" value="0">
                        <button type="submit">Comprar producto</button>
                    </form>

                    @if (Auth::user()->points > 0 && ($product->price - Auth::user()->points/100 > 5))
                        <div class="checkbox">
                            ¿Desea usar sus puntos?
                            <input type="checkbox" id="checkboxDiscount" class="checkbox__custom" onclick="updateCheckboxValue()">
                        </div>
                    @endif
                        <script>
                            function updateCheckboxValue() {
                                var checkbox = document.getElementById("checkboxDiscount");
                                var priceElement = document.querySelector(".product__info__price");
                                var hiddenInput = document.getElementById("purchaseButton");

                                if (checkbox.checked == true){
                                    priceElement.classList.add("crossed-out");
                                    hiddenInput.value = '1';
                                    document.getElementById("price__discounted").style.display = "block";
                                } else {
                                    priceElement.classList.remove("crossed-out");
                                    hiddenInput.value = '0';
                                    document.getElementById("price__discounted").style.display = "none";
                                }
                            }
                        </script>
                    @endif
                </div>
                
            </div>
        </div>
        <div class="product__info__link">
            <a class="product__info__back" href="{{ url()->previous() }}">Volver</a>
        </div>
        
        <div class="share-socialmedia">
            Comparte tu producto en: 
            <a href="https://twitter.com/intent/tweet?url={{ urlencode($productUrl) }}&text={{ urlencode($product->name . ' - Precio: ' . $product->price . '€ - Descripción: ' . $product->description) }}&hashtags=errreShop" target="_blank">
                <img src="{{ asset('img/socialmedia/twitter.svg') }}" alt="Compartir en Twitter">
            </a>
            <a href="https://api.whatsapp.com/send?text={{ urlencode($product->name . ' - Precio: ' . $product->price . '€ - Descripción: ' . $product->description) }} {{ urlencode($productUrl) }}" target="_blank">
                <img src="{{ asset('img/socialmedia/whatsapp.svg') }}" alt="Compartir en Whatsapp">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($productUrl) }}&quote={{ urlencode($product->name) }}" target="_blank">
                <img src="{{ asset('img/socialmedia/facebook.svg') }}" />
            </a>    
        </div>
    @endsection  