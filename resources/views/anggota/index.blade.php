@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold m-0" style="color: #334155;">Data Anggota</h3>
        <p class="text-muted small">Daftar siswa yang terdaftar sebagai anggota perpustakaan</p>
    </div>
    <a href="{{ route('anggota.create') }}" class="btn btn-success shadow-sm px-4 py-2" style="border-radius: 10px;">
        <i class="fas fa-user-plus me-2"></i> Tambah Anggota
    </a>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 16px; overflow: hidden;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table mb-0 align-middle table-hover">
                <thead style="background-color: #f8fafc;">
                    <tr>
                        <th class="ps-4 py-3 text-muted small fw-bold" width="5%">NO</th>
                        <th class="py-3 text-muted small fw-bold">NIS</th>
                        <th class="py-3 text-muted small fw-bold">NAMA LENGKAP</th>
                        <th class="py-3 text-muted small fw-bold">KELAS</th>
                        <th class="py-3 text-muted small fw-bold">NO. TELP</th>
                        <th class="py-3 text-muted small fw-bold text-center" width="15%">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $key => $anggota)
                    <tr>
                        <td class="ps-4 text-muted">{{ $key + 1 }}</td>
                        <td class="fw-bold text-success">{{ $anggota->nis }}</td>
                        <td class="fw-bold text-dark">{{ $anggota->nama }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $anggota->kelas }}</span></td>
                        <td class="text-muted">{{ $anggota->telp }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="{{ route('anggota.edit', $anggota->id) }}" class="btn btn-sm btn-outline-primary border-0">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('anggota.destroy', $anggota->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger border-0" onclick="return confirm('Hapus anggota ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="fas fa-users fa-3x mb-3 opacity-25"></i>
                            <p>Belum ada data anggota sekolah.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection