@extends('layouts/layout')
    @section('main-content')
        <h2>Lista de Transacciones</h2>

        <input type="checkbox" id="ordenar-checkbox">
        <label for="ordenar-checkbox">Precio ascendente</label>
        <table id="transactions" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Comprador</th>
                    <th>Vendedor</th>
                    <th>% para vendedor €</th>
                    <th>% para empresa €</th>
                    <th>€ total</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>{{ $transaction->buyer_id}}</td>
                        <td>{{ $transaction->user_id}}</td>
                        <td>{{ $transaction->profit_seller}}</td>
                        <td>{{ $transaction->profit_company}}</td>
                        <td class="precio-columna">{{ $transaction->total_price}}</td>

                        <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3"></td>
                    <td>{{ $transactions->sum('profit_seller') }}</td>
                    <td>{{ $transactions->sum('profit_company') }}</td>
                    <td>{{ $transactions->sum('total_price') }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <h2>Lista de Usuarios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @if($user->role !== 'admin')
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <form action="{{ route('admin.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <script>
            $(document).ready(function() {
                var ordenAscendente = true;
        
                $('#ordenar-checkbox').click(function() {
                    ordenAscendente = !ordenAscendente;
        
                    if ($(this).is(':checked')) {
                        ordenarTabla(ordenAscendente);
                    } else {
                        restaurarOrdenOriginal();
                    }
                });
        
                function ordenarTabla(ascendente) {
                    var rows = $('#transactions tbody tr').get();
        
                    rows.sort(function(rowA, rowB) {
                        var priceA = parseFloat($(rowA).find('.precio-columna').text());
                        var priceB = parseFloat($(rowB).find('.precio-columna').text());
        
                        if (ascendente) {
                            return priceA - priceB;
                        } else {
                            return priceB - priceA;
                        }
                    });
        
                    $('#transactions tbody').empty();
        
                    $.each(rows, function(index, row) {
                        $('#transactions tbody').append(row);
                    });
                }
        
                function restaurarOrdenOriginal() {
                    var rows = $('#transactions tbody tr').get();
        
                    rows.sort(function(rowA, rowB) {
                        var indexA = $(rowA).index();
                        var indexB = $(rowB).index();
                        return indexA - indexB;
                    });
        
                    $('#transactions tbody').empty();
        
                    $.each(rows, function(index, row) {
                        $('#transactions tbody').append(row);
                    });
                }
            });
        </script>
        
        
        
    @endsection