@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="header-top mb-4 text-center">
                <h3 class="fw-bold m-0" style="color: #334155;">Tambah Koleksi Buku</h3>
            </div>

            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-body p-4 p-md-5">
                     <form action="{{ route('buku.store') }}" method="POST">
                        @csrf
                        <div class="row g-4">
                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">Judul Buku</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light border-end-0" style="border-radius: 10px 0 0 10px;">
                                        <i class="fas fa-book text-muted"></i>
                                    </span>
                                    <input type="text" name="judul" class="form-control bg-light border-start-0" 
                                           placeholder="Masukkan judul lengkap" required 
                                           style="border-radius: 0 10px 10px 0; height: 48px;">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">Penulis</label>
                                <input type="text" name="penulis" class="form-control bg-light" 
                                       placeholder="Nama penulis" required 
                                       style="border-radius: 10px; height: 48px;">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control bg-light" 
                                       placeholder="Nama penerbit" required 
                                       style="border-radius: 10px; height: 48px;">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Kategori</label>
                                <select name="kategori" class="form-select bg-light" style="border-radius: 10px; height: 48px;">
                                    <option value="" selected disabled>Pilih Kategori...</option>
                                    <option value="Teknologi">Fiksi</option>
                                    <option value="Fiksi">Non Fiksi</option>
                                    <option value="Sains">Teknologi</option>
                                    <option value="Sains">Sejarah</option>
                                    <option value="Sains">Komik</option>
                                    <option value="Sains">Akademik</option>
                                    <option value="Sains">Bahasa</option>
                                    <option value="Sains">Psikologi</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label fw-bold text-dark">Tahun Terbit</label>
                                <input type="number" name="tahun_terbit" class="form-control bg-light" 
                                       placeholder="Contoh: 2024" required 
                                       style="border-radius: 10px; height: 48px;">
                            </div>

                            <div class="col-12">
                                <label class="form-label fw-bold text-dark">Status</label>
                                <select name="status" class="form-select bg-light fw-semibold text-success" style="border-radius: 10px; height: 48px;">
                                    <option value="Tersedia">Tersedia</option>
                                    <option value="Dipinjam">Dipinjam</option>
                                </select>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('buku.index') }}" class="btn btn-light px-4 py-2" 
                               style="border-radius: 10px; font-weight: 600;">
                                Batal
                            </a>
                            <button type="submit" class="btn btn-success px-5 py-2" 
                                    style="border-radius: 10px; font-weight: 600; background: linear-gradient(135deg, #10b981, #059669); border: none;">
                                <i class="fas fa-save me-2"></i> Simpan Koleksi
                            </button>
                        </div>

                    </form>

                </div>
            </div>
            
            <p class="text-center text-muted mt-4 small">Sistem Informasi Perpustakaan &copy; 2026</p>
        </div>
    </div>
</div>

<style>
    .form-control:focus, .form-select:focus {
        background-color: #fff !important;
        border-color: #10b981 !important;
        box-shadow: 0 0 0 0.25rem rgba(16, 185, 129, 0.1) !important;
    }
</style>
@endsection