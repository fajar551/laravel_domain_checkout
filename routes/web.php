<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [DomainController::class, 'index']);
Route::post('/check-domain', [DomainController::class, 'checkDomain']);
Route::get('/config/{domain}', [DomainController::class, 'config'])->middleware('auth');

// Proteksi dengan middleware 'auth'
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout')->middleware('auth');
Route::get('/invoice/{id}', [OrderController::class, 'showInvoice'])->name('invoice.show')->middleware('auth');
Route::get('/invoice/{id}/download', [OrderController::class, 'downloadInvoice'])->name('invoice.download')->middleware('auth');

// Halaman login dan registrasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
