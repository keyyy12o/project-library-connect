@extends('layouts.app') 

@section('content')
<style>
    body {
        background: #f5f7fa;
    }
    .card-detail {
        border-radius: 20px;
        border: none;
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <!-- Card Utama -->
            <div class="card card-detail shadow-lg p-4 p-md-5">
                <div class="text-center">
                    <h1 class="fw-bold text-dark mb-2">{{ $buku->judul }}</h1>
                    <p class="text-success fw-semibold mb-4" style="font-size: 1.1rem;">
                        Penulis: {{ $buku->penulis }}
                    </p>
                    <hr class="my-4" style="opacity: 0.1;">
                </div>

                <div class="mt-2">
                    <h5 class="fw-bold mb-3 text-dark">Ringkasan Cerita:</h5>
                    <p class="text-secondary lh-lg" style="text-align: justify; font-size: 1.05rem;">
                        @if($buku->sinopsis)
                            {!! nl2br(e($buku->sinopsis)) !!}
                        @else
                            Buku <strong>{{ $buku->judul }}</strong> adalah karya literatur yang ditulis oleh <strong>{{ $buku->penulis }}</strong>. 
                            Buku ini membahas secara mendalam mengenai topik <em>{{ $buku->kategori }}</em> dan memberikan wawasan baru 
                            bagi para pembaca. Terbit pada tahun {{ $buku->tahun_terbit }}, karya ini menjadi salah satu referensi 
                            penting dalam koleksi Library Connect.
                        @endif
                    </p>
                </div>

                <div class="mt-5 text-center d-grid">
                    <a href="/koleksi" class="btn btn-dark rounded-pill py-2 shadow-sm fw-bold">
                        Kembali ke Daftar Buku
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection