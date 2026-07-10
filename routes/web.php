<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/koleksi', [HomeController::class, 'koleksi']);
Route::get('/detail/{id}', [\App\Http\Controllers\BukuController::class, 'show']);
Route::get('/kategori/{nama}', [UserController::class, 'kategori']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::any('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [AdminController::class, 'index'])
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->name('dashboard');
Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::post('/peminjaman/{id}/delete', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');
Route::post('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');
Route::resource('buku', BukuController::class);
Route::get('/kelola-buku', function () {
    return view('kelola-buku');
}); 
Route::resource('anggota', AnggotaController::class);

