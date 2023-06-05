@extends('layouts/layout')
    @section('main-content')
        <!-- admin.blade.php -->
    <h1>Lista de Transacciones</h1>
    <table class="transaction-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Comprador</th>
                <th>Vendedor</th>
                <th>% para vendedor</th>
                <th>% para empresa</th>
                <th>€ total</th>
                <th>Fecha</th>
                <!-- Agrega más columnas según tus necesidades -->
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
                    <td>{{ $transaction->total_price}}</td>

                    <td>{{ $transaction->created_at->format('Y-m-d H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endsection