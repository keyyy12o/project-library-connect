@extends('layouts.app')

@section('content')
<style>
    /* Reset & Background */
    body { background-color: #f8fafc; }
    
    /* Container & Header Section */
    .main-wrapper { padding: 60px 0; min-height: 85vh; }
    .header-group h1 { color: #1e293b; font-weight: 800; letter-spacing: -1px; }
    .header-group p { color: #64748b; font-size: 1.1rem; }

    /* Card Styling */
    .glass-card {
        background: #ffffff;
        border: none;
        border-radius: 24px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.03);
        padding: 35px;
        transition: 0.3s ease;
    }

    /* Tabel Estetik */
    .table-modern thead th {
        background: transparent;
        color: #94a3b8;
        font-weight: 700;
        text-transform: uppercase;
        font-size: 0.75rem;
        letter-spacing: 1.5px;
        border-bottom: 2px solid #f1f5f9;
        padding-bottom: 20px;
    }

    .table-modern tbody td {
        padding: 25px 0;
        vertical-align: middle;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
    }

    /* Status Badge */
    .status-pill {
        background: #f1f5f9;
        color: #475569;
        padding: 8px 18px;
        border-radius: 12px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-block;
    }
    
    .status-active { background: #dcfce7; color: #15803d; }
    .status-late { background: #fee2e2; color: #b91c1c; }

    .btn-action {
        padding: 12px 24px;
        border-radius: 14px;
        font-weight: 700;
        transition: 0.4s;
    }
    
    .btn-add { background: #0d6efd; color: white; border: none; }
    .btn-add:hover { background: #0056b3; transform: translateY(-3px); box-shadow: 0 10px 20px rgba(13, 110, 253, 0.2); }
</style>

<div class="container main-wrapper" data-aos="fade-up">
    <div class="row align-items-center mb-5">
        <div class="col-md-8 header-group">
            <h1>Data Peminjaman</h1>
        </div>
        <div class="col-md-4 text-md-end">
            <a href="{{ route('peminjaman.create') }}" class="btn btn-action btn-add shadow-sm">
                <i class="fas fa-plus-circle me-2"></i>Tambah Data
            </a>
        </div>
    </div>

    <div class="glass-card">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>Anggota</th>
                        <th>Buku</th>
                        <th class="text-center">Tgl Pinjam</th>
                        <th class="text-center">Batas Kembali</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Denda</th> 
                        <th class="text-end">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjamans as $p)
                    <tr>
                        <td>
                            <div class="fw-bold d-block">{{ $p->anggota->nama ?? 'Unknown' }}</div>
                            <span class="text-muted small">ID: {{ $p->anggota_id }}</span>
                        </td>
                        <td>
                            <span class="fw-semibold">{{ $p->buku->judul ?? 'Buku Tidak Ada' }}</span>
                        </td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($p->tgl_pinjam)) }}</td>
                        <td class="text-center">{{ date('d/m/Y', strtotime($p->tgl_kembali)) }}</td>
                        <td class="text-center">
                            @php
                                $deadline = \Carbon\Carbon::parse($p->tgl_kembali);
                                $isLate = \Carbon\Carbon::now()->gt($deadline) && $p->status == 'Dipinjam';
                            @endphp
                            <span class="status-pill {{ $p->status == 'Dipinjam' ? ($isLate ? 'status-late' : 'status-active') : '' }}">
                                {{ $isLate ? 'Terlambat' : $p->status }}
                            </span>
                        </td>
                        {{-- Bagian Denda yang sudah diperbaiki --}}
                        <td class="text-center fw-bold {{ $p->denda > 0 ? 'text-danger' : 'text-muted' }}" style="white-space: nowrap;">
                            Rp {{ number_format($p->denda ?? 0, 0, ',', '.') }}
                        </td>
                        <td class="text-end">
                            <div class="d-flex justify-content-end gap-3">
                                @if($p->status == 'Dipinjam')
                                <form action="/peminjaman/{{ $p->id }}/kembali" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-success p-0 text-decoration-none fw-bold">
                                        <i class="fas fa-undo me-1"></i> Kembali
                                    </button>
                                </form>
                                @endif

                                <form action="/peminjaman/{{ $p->id }}/delete" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link text-danger p-0 text-decoration-none fw-bold" onclick="return confirm('Hapus data ini?')">
                                        <i class="fas fa-trash-alt me-1"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="text-muted italic">Belum ada aktivitas peminjaman.</div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection