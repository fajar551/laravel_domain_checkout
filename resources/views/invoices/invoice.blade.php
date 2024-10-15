@extends('layouts.app')

@section('title', 'Invoice')

@section('content')
    <div class="card shadow p-4 mb-5 animate__animated animate__fadeIn">
        <h3 class="mb-4 text-center">Invoice #{{ $order->id }}</h3>
        <div class="mb-3">
            <strong>Nama:</strong> {{ $order->user->name }} <br>
            <strong>Email:</strong> {{ $order->user->email }} <br>
            <strong>Domain:</strong> {{ $order->domain->name }} <br>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Pembelian domain {{ $order->domain->name }}</td>
                <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="2" class="text-end">Total:</th>
                <th>Rp {{ number_format($order->total_price, 0, ',', '.') }}</th>
            </tr>
            </tfoot>
        </table>

        <div class="alert alert-warning mt-4 text-center animate__animated animate__fadeInUp">
            <strong>UNPAID</strong><br>
            Silakan bayar di nomor rekening berikut ini: <strong>663721667321</strong>
        </div>
    </div>
@endsection
