@extends('layouts.app')

@section('title', 'Hasil Pencarian Domain')

@section('content')
    <div class="card shadow p-4 mb-5 animate__animated animate__fadeIn">
        <h3 class="mb-4 text-center">Hasil Pencarian Domain</h3>

        @if($status == 'available')
            <div class="alert alert-success animate__animated animate__fadeInUp">
                <strong>Selamat!</strong> Domain <strong>{{ $domain }}</strong> tersedia.
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="/config/{{ $domain }}" class="btn btn-success btn-lg px-5 animate__animated animate__pulse animate__infinite">Pesan Sekarang</a>
            </div>
        @else
            <div class="alert alert-danger animate__animated animate__fadeInUp">
                <strong>Maaf!</strong> Domain <strong>{{ $domain }}</strong> tidak tersedia.
            </div>
            <div class="d-flex justify-content-center mt-4">
                <a href="/" class="btn btn-secondary btn-lg px-5">Cari Lagi</a>
            </div>
        @endif
    </div>
@endsection
