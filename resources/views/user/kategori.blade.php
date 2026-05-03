@extends('layouts.app')

@section('content')
<style>
    /* Header Kategori */
    .category-title { 
        border-left: 5px solid #1e7e4f; 
        padding-left: 15px; 
        font-weight: 800; 
        margin-bottom: 40px; 
        color: #1e293b; 
    }

    /* Kartu Buku */
    .book-card { 
        border: none; 
        border-radius: 20px; 
        transition: all 0.4s ease; 
        background: #fff; 
        height: 100%; 
        box-shadow: 0 10px 25px rgba(0,0,0,0.05); 
        overflow: hidden;
    }
    
    .book-card:hover { 
        transform: translateY(-10px); 
        box-shadow: 0 15px 35px rgba(30, 126, 79, 0.15); 
    }

    /* Wrapper Cover */
    .book-cover-wrapper { 
        background: #f1f5f9; 
        height: 250px; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        position: relative; 
        overflow: hidden;
    }

    .book-cover-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Info Buku */
    .book-info { 
        padding: 20px; 
        text-align: center; 
    }

    .book-title {
        font-size: 1rem;
        font-weight: 700;
        color: #1e293b;
        margin-bottom: 5px;
    }

    .book-author {
        font-size: 0.85rem;
        color: #64748b;
        margin-bottom: 15px;
    }

    /* Tombol Detail */
    .btn-detail { 
        background: #1e7e4f; 
        color: white; 
        border: none; 
        border-radius: 12px; 
        width: 100%; 
        font-weight: 600; 
        padding: 10px; 
        transition: 0.3s; 
    }

    .btn-detail:hover { 
        background: #145335; 
        color: white; 
        box-shadow: 0 4px 12px rgba(30, 126, 79, 0.3);
    }

    /* Modal Styling */
    .modal-content {
        border-radius: 24px;
        border: none;
    }

    .modal-sinopsis {
        text-align: justify;
        line-height: 1.7;
        color: #475569;
        font-size: 0.95rem;
    }
</style>

<div class="container py-5">
    <h2 class="category-title" data-aos="fade-right">
        Kategori: <span class="text-success">{{ request()->route('nama') }}</span>
    </h2>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-6 g-4">
        @php
            $koleksiBuku = $bukus ?? $buku ?? $data ?? [];
        @endphp

        @forelse($koleksiBuku as $item)
        <div class="col" data-aos="fade-up">
            <div class="book-card">
                <div class="book-cover-wrapper">
                    {{-- CEK KOLOM GAMBAR SESUAI DATABASE --}}
                    @if(!empty($item->gambar))
                        {{-- MENGARAH KE public/images/ --}}
                        <img src="{{ asset('images/'.$item->gambar) }}" alt="{{ $item->judul }}">
                    @else
                        {{-- TAMPILAN JIKA TIDAK ADA GAMBAR --}}
                        <div class="text-center text-muted">
                            <i class="fas fa-book fa-3x mb-2 opacity-25"></i>
                            <div class="small">No Cover</div>
                        </div>
                    @endif
                </div>
                <div class="book-info">
                    <div class="book-title text-truncate" title="{{ $item->judul }}">
                        {{ $item->judul }}
                    </div>
                    <div class="book-author text-truncate">
                        {{ $item->penulis }}
                    </div>
                    <button class="btn btn-detail" data-bs-toggle="modal" data-bs-target="#modalBuku{{ $item->id }}">
                        Detail
                    </button>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="opacity-25">
                <i class="fas fa-book-open fa-5x mb-3 text-success"></i>
            </div>
            <h4 class="text-muted">Oops! Belum ada koleksi.</h4>
            <p class="text-muted">Buku untuk kategori ini akan segera hadir.</p>
        </div>
        @endforelse
    </div>
</div>

{{-- Modal Section --}}
@foreach($koleksiBuku as $item)
<div class="modal fade" id="modalBuku{{ $item->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header border-0 pt-4 px-4">
                <h5 class="fw-bold m-0">{{ $item->judul }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-success bg-opacity-10 p-2 rounded-3 me-3">
                        <i class="fas fa-user-edit text-success"></i>
                    </div>
                    <div>
                        <small class="text-muted d-block">Penulis</small>
                        <span class="fw-semibold">{{ $item->penulis }}</span>
                    </div>
                </div>
                <hr class="opacity-50">
                <p class="fw-bold mb-2"><i class="fas fa-align-left me-2 text-success"></i>Sinopsis</p>
                <p class="modal-sinopsis">
                    {{ $item->sinopsis ?? 'Sinopsis untuk buku ini belum tersedia di sistem kami.' }}
                </p>
            </div>
            <div class="modal-footer border-0 pb-4">
                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection