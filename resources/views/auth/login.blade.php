@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="card shadow p-4 mb-5 w-50 mx-auto">
        <h3 class="mb-4 text-center">Halaman Login</h3>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-dark w-100">LOGIN</button>
        </form>
    </div>
@endsection
