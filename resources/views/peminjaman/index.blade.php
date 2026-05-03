@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold m-0">Data Peminjaman</h3>
    <a href="{{ route('peminjaman.create') }}" class="btn btn-success px-4 py-2">
        <i class="fas fa-plus-circle me-2"></i> Tambah Peminjaman
    </a>
</div>

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">NAMA ANGGOTA</th>
                        <th>JUDUL BUKU</th>
                        <th class="text-center">TGL PINJAM</th>
                        <th class="text-center">TGL KEMBALI</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">DENDA</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman as $item)
                    <tr>
                        <td class="ps-4">
                            <strong>{{ $item->anggota->nama ?? '-' }}</strong><br>
                            <small>{{ $item->anggota->nis ?? '-' }}</small>
                        </td>
                        <td>{{ $item->buku->judul ?? '-' }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->tgl_pinjam)->format('d/m/Y') }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($item->tgl_kembali)->format('d/m/Y') }}</td>
                        <td class="text-center">
                            @if($item->status == 'Dikembalikan' || $item->status == 'Sudah Kembali')
                                <span class="badge bg-success">Sudah Kembali</span>
                            @elseif(\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($item->tgl_kembali)))
                                <span class="badge bg-danger">Terlambat</span>
                            @else
                                <span class="badge bg-info">Dipinjam</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <span class="fw-bold {{ $item->denda > 0 ? 'text-danger' : 'text-muted' }}">
                                {{-- HANYA nampilin data dari database, jangan hitung di sini! --}}
                                Rp {{ number_format($item->denda, 0, ',', '.') }}
                            </span>
                        </td>
                        </td>
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                @if($item->status != 'Dikembalikan' && $item->status != 'Sudah Kembali')
                                    <form action="{{ route('peminjaman.kembali', $item->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">Kembali</button>
                                    </form>
                                @endif
                                <form action="/peminjaman/{{ $item->id }}/delete" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Hapus?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">Belum ada data.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection