<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;

// --- FRONTEND ROUTES ---
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/koleksi', [HomeController::class, 'koleksi']);
Route::get('/detail/{id}', [UserController::class, 'detail']);
Route::get('/kategori/{nama}', [UserController::class, 'kategori']);

// --- AUTH ROUTES ---
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');

// --- ADMIN DASHBOARD ---
Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->name('dashboard');

// --- KELOLA PEMINJAMAN (LENGKAP DENGAN DENDA) ---
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::post('/peminjaman/{id}/delete', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
Route::post('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');

// --- KELOLA BUKU ---
Route::resource('buku', BukuController::class);
// Route manual tambahan jika diperlukan (opsional karena sudah ada resource)
Route::get('/kelola-buku', function () {
    return view('kelola-buku');
});

// --- KELOLA ANGGOTA ---
Route::resource('anggota', AnggotaController::class);