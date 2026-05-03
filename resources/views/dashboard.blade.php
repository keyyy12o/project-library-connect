@extends('layouts.admin') {{-- Pastikan sudah ganti ke layouts.admin agar ada sidebarnya --}}

@section('content')
<!-- Header dengan Nuansa Modern -->
<div class="header-top d-flex justify-content-between align-items-center mb-4" data-aos="fade-down">
    <div>
        <h3 class="fw-bold m-0" style="color: #334155;">Dashboard Overview</h3>
        <p class="text-muted small mb-0">Selamat datang kembali! Berikut ringkasan perpustakaan hari ini.</p>
    </div>
    <div class="text-end d-none d-md-block">
        <div class="d-flex align-items-center bg-white px-3 py-2 rounded-pill shadow-sm">
            <i class="fas fa-calendar-alt text-primary me-2"></i>
            <span class="small fw-bold text-secondary">{{ date('d M Y') }}</span>
        </div>
    </div>
</div>

<!-- Barisan Card Statistik -->
<div class="row g-4 mb-4">
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="100">
        <div class="stat-card bg-books p-4 shadow-sm border-0 h-100">
            <div class="small opacity-75 text-white fw-medium">Total Koleksi Buku</div>
            <div class="display-6 fw-bold text-white">48</div>
            <div class="text-white-50 small mt-2"><i class="fas fa-arrow-up me-1"></i> +2 buku baru minggu ini</div>
            <i class="fas fa-book icon-bg"></i>
        </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="200">
        <div class="stat-card bg-members p-4 shadow-sm border-0 h-100">
            <div class="small opacity-75 text-white fw-medium">Total Anggota</div>
            <div class="display-6 fw-bold text-white">10</div>
            <div class="text-white-50 small mt-2"><i class="fas fa-user-check me-1"></i> 75% anggota aktif</div>
            <i class="fas fa-users icon-bg"></i>
        </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="300">
        <div class="stat-card bg-active p-4 shadow-sm border-0 h-100">
            <div class="small opacity-75 text-white fw-medium">Peminjaman Aktif</div>
            <div class="display-6 fw-bold text-white">8</div>
            <div class="text-white-50 small mt-2"><i class="fas fa-sync me-1"></i> 3 perlu diproses</div>
            <i class="fas fa-clock icon-bg"></i>
        </div>
    </div>
    <div class="col-md-3" data-aos="zoom-in" data-aos-delay="400">
        <div class="stat-card bg-late p-4 shadow-sm border-0 h-100">
            <div class="small opacity-75 text-white fw-medium">Buku Terlambat</div>
            <div class="display-6 fw-bold text-white">3</div>
            <div class="text-white-50 small mt-2"><i class="fas fa-bell me-1"></i> Kirim peringatan</div>
            <i class="fas fa-exclamation-triangle icon-bg"></i>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Tabel Buku Terbaru -->
    <div class="col-lg-8" data-aos="fade-right">
        <div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fas fa-history text-muted me-2"></i>
                    <h5 class="fw-bold m-0" style="color: #334155;">Aktivitas Terbaru</h5>
                </div>
                <button class="btn btn-light btn-sm text-primary fw-bold">Lihat Semua</button>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle table-hover">
                        <thead style="background-color: #f8fafc;">
                            <tr>
                                <th class="ps-4 py-3 text-muted small fw-bold">JUDUL BUKU</th>
                                <th class="py-3 text-muted small fw-bold">PEMINJAM</th>
                                <th class="py-3 text-muted small fw-bold text-center">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="fw-semibold text-dark">Dilan 1990</div>
                                    <div class="text-muted extra-small">ID: #BK-001</div>
                                </td>
                                <td class="text-muted">Andi Wijaya</td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">
                                        <i class="fas fa-check-circle me-1"></i> Tersedia
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-4 py-3">
                                    <div class="fw-semibold text-dark">Harry Potter</div>
                                    <div class="text-muted extra-small">ID: #BK-042</div>
                                </td>
                                <td class="text-muted">Siti Aminah</td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-warning-subtle text-warning px-3 py-2">
                                        <i class="fas fa-hourglass-half me-1"></i> Dipinjam
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Aksi Cepat (Quick Actions) -->
    <div class="col-lg-4" data-aos="fade-left">
        <div class="card border-0 shadow-sm p-4" style="border-radius: 16px; background: #fff;">
            <h5 class="fw-bold mb-4" style="color: #334155;">Aksi Cepat</h5>
            <div class="d-grid gap-3">
                <a href="/buku/create" class="btn btn-outline-success py-3 rounded-4 d-flex align-items-center justify-content-center">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Buku Baru
                </a>
                <a href="/anggota/create" class="btn btn-outline-primary py-3 rounded-4 d-flex align-items-center justify-content-center">
                    <i class="fas fa-user-plus me-2"></i> Registrasi Anggota
                </a>
                <div class="p-3 bg-light rounded-4 border-start border-primary border-4 mt-2">
                    <p class="small text-muted mb-0"><strong>Tips:</strong> Pastikan stok buku selalu diperbarui setiap ada pengembalian.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahan Style Khusus untuk Halaman Ini -->
<style>
    /* Styling Card Statistik */
    .stat-card {
        border-radius: 20px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    .icon-bg {
        position: absolute;
        right: -10px;
        bottom: -10px;
        font-size: 4.5rem;
        opacity: 0.15;
        color: #fff;
    }

    /* Gradien Warna Modern */
    .bg-books { background: linear-gradient(135deg, #10b981, #059669); }
    .bg-members { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .bg-active { background: linear-gradient(135deg, #3b82f6, #2563eb); }
    .bg-late { background: linear-gradient(135deg, #ef4444, #dc2626); }

    /* Styling Badge */
    .bg-success-subtle { background-color: #ecfdf5 !important; border: 1px solid #10b981; }
    .bg-warning-subtle { background-color: #fffbeb !important; border: 1px solid #f59e0b; }
    
    .extra-small { font-size: 0.75rem; }
    
    /* Perbaikan Table */
    .table thead th {
        letter-spacing: 0.05em;
        border: none;
    }
    .table-hover tbody tr:hover {
        background-color: #f1f5f9;
        cursor: pointer;
    }
</style>
@endsection