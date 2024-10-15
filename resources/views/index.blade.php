@extends('layouts.app')

@section('title', 'Cari Domain')

@section('content')
    <div class="card shadow p-4 mb-5 animate__animated animate__fadeIn">
        <h3 class="mb-4 text-center">Cari Domain Anda</h3>
        <form method="POST" action="/check-domain">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="domain" class="form-control" placeholder="Contoh: example.com" required>
                <button type="submit" class="btn btn-dark">CARI</button>
            </div>
        </form>
    </div>
@endsection
