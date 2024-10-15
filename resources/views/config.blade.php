@extends('layouts.app')

@section('title', 'Konfigurasi Domain')

@section('content')
    <div class="card shadow p-4 mb-5 animate__animated animate__fadeIn">
        <h3 class="mb-4 text-center">Konfigurasi Domain Anda</h3>

        @guest
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <input type="hidden" name="domain" value="{{ $domain }}">

                <div class="mb-3">
                    <label class="form-label">Nama:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-dark">CHECKOUT</button>
                    <a href="{{ route('login') }}" class="text-primary">atau login di sini</a>
                </div>
            </form>
        @else
            <form method="POST" action="{{ route('checkout') }}">
                @csrf
                <input type="hidden" name="domain" value="{{ $domain }}">

                <div class="mb-3">
                    <label class="form-label">Domain:</label>
                    <input type="text" class="form-control" value="{{ $domain }}" readonly>
                </div>
                <div class="mb-3">
                    <label class="form-label">Durasi:</label>
                    <select name="years" class="form-select">
                        <option value="1">1 Tahun - Rp 100.000</option>
                        <option value="2">2 Tahun - Rp 190.000</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-dark w-100 mt-3 animate__animated animate__pulse animate__infinite">CHECKOUT</button>
            </form>
        @endguest
    </div>
@endsection
