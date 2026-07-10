@extends('layouts.admin') <!-- GANTI DARI 'admin' KE 'app' -->

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold m-0" style="color: #334155;">Data Buku</h3>
        <p class="text-muted small">Daftar seluruh koleksi buku perpustakaan</p>
    </div>
    <a href="/buku/create" class="btn btn-success shadow-sm px-4 py-2" style="border-radius: 10px;">
        <i class="fas fa-plus me-2"></i> Tambah Buku
    </a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px;">
    <div class="card-body p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="py-3">No</th>
                        <th class="py-3">Judul</th>
                        <th class="py-3">Penulis</th>
                        <th class="py-3">Kategori</th>
                        <th class="py-3 text-center">Status</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $buku)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td class="fw-bold">{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>
                            <span class="badge bg-light text-dark border">{{ $buku->kategori }}</span>
                        </td>
                        <td class="text-center">
                            <span class="badge rounded-pill {{ $buku->status == 'Tersedia' ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} px-3 py-2">
                                {{ $buku->status }}
                            </span>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('buku.destroy', $buku->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-link text-danger p-0" title="Hapus Buku">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .bg-success-subtle { background-color: #e6fffa; color: #38a169; border: 1px solid #b2f5ea; }
    .bg-danger-subtle { background-color: #fff5f5; color: #e53e3e; border: 1px solid #feb2b2; }
</style>

@endsection