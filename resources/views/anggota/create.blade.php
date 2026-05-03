@extends('layouts.app')

@section('content')
<div class="container py-2">
    <div class="row justify-content-center">
        <div class="col-md-7">
            
            <div class="header-top mb-4 text-center">
                <h3 class="fw-bold m-0" style="color: #334155;">Registrasi Anggota</h3>
                <p class="text-muted small">Input data siswa untuk akses peminjaman buku</p>
            </div>

            <div class="card border-0 shadow-sm" style="border-radius: 20px;">
                <div class="card-body p-4 p-md-5">
                    
                    <form action="{{ route('anggota.store') }}" method="POST">
                        @csrf

                        <div class="row g-4">
                            <!-- NIS -->
                            <div class="col-12">
                                <label class="form-label fw-bold">NIS (Nomor Induk Siswa)</label>
                                <input type="number" name="nis" class="form-control bg-light" 
                                       placeholder="Contoh: 2223101" required 
                                       style="border-radius: 10px; height: 48px;">
                            </div>

                            <!-- Nama -->
                            <div class="col-12">
                                <label class="form-label fw-bold">Nama Lengkap Siswa</label>
                                <input type="text" name="nama" class="form-control bg-light" 
                                       placeholder="Masukkan nama sesuai absen" required 
                                       style="border-radius: 10px; height: 48px;">
                            </div>

                            <!-- Kelas -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Kelas</label>
                                <input type="text" name="kelas" class="form-control bg-light" 
                                       placeholder="Contoh: XII RPL 1" required 
                                       style="border-radius: 10px; height: 48px;">
                            </div>

                            <!-- No Telp -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">No. WhatsApp</label>
                                <input type="text" name="telp" class="form-control bg-light" 
                                       placeholder="08..." required 
                                       style="border-radius: 10px; height: 48px;">
                            </div>

                            <!-- Alamat -->
                            <div class="col-12">
                                <label class="form-label fw-bold">Alamat Rumah</label>
                                <textarea name="alamat" class="form-control bg-light" rows="3" 
                                          placeholder="Alamat lengkap siswa..."
                                          style="border-radius: 10px;"></textarea>
                            </div>
                        </div>

                        <hr class="my-4 opacity-25">

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('anggota.index') }}" class="btn btn-light px-4 py-2" 
                               style="border-radius: 10px; font-weight: 600;">Batal</a>
                            <button type="submit" class="btn btn-success px-5 py-2" 
                                    style="border-radius: 10px; font-weight: 600; background: linear-gradient(135deg, #10b981, #059669); border: none;">
                                <i class="fas fa-check-circle me-2"></i> Daftarkan Siswa
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection