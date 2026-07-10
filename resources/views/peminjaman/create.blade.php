@extends('layouts.admin')

@section('content')

<h4 class="mb-4">Tambah Peminjaman</h4>

<div class="card border-0 shadow-sm" style="border-radius: 12px;">
    <div class="card-body p-4">

        <form action="/peminjaman/store" method="POST">
            @csrf

            <div class="mb-3">
                <label class="fw-bold">Nama Siswa</label>
                <!-- Ganti input text jadi select (dropdown) -->
                <select name="anggota_id" class="form-select" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($anggota as $s)
                        <option value="{{ $s->id }}">{{ $s->nis }} - {{ $s->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="fw-bold">Judul Buku</label>
                <select name="buku_id" class="form-select" required>
                    <option value="">-- Pilih Buku yang Tersedia --</option>
                    @foreach($buku as $b)
                        <option value="{{ $b->id }}">{{ $b->judul }}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="fw-bold">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" class="form-control"
                        value="{{ date('Y-m-d') }}" required>
                </div>

               <div class="col-md-6 mb-3">
                    <label class="fw-bold">Tanggal Kembali</label>
                    <input type="date" name="tgl_kembali" class="form-control" required>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <a href="/peminjaman" class="btn btn-secondary me-2 px-4">Kembali</a>
                <button type="submit" class="btn btn-success px-4">Simpan</button>
            </div>

        </form>

    </div>
</div>

@endsection