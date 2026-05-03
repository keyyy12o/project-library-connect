<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Koleksi Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fb;
        }

        .card {
            border-radius: 15px;
            transition: 0.3s;
            overflow: hidden; /* Agar gambar tidak keluar dari radius */
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }

        /* Tinggi gambar kita bikin lebih proporsional (250px) */
        .card img {
            height: 250px;
            object-fit: cover;
        }

        .no-cover {
            height: 250px;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            color: #adb5bd;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">📚 Semua Koleksi Buku</h3>
        <a href="/" class="btn btn-outline-secondary btn-sm rounded-pill">← Kembali ke Beranda</a>
    </div>

    <!-- GRID BUKU -->
    <div class="row g-4">
   <div class="container mt-5">
    <h4 class="fw-bold border-start border-success border-4 ps-3 mb-4">
        Hasil Pencarian: <span class="text-success">{{ request('search') }}</span>
    </h4>

    <div class="row g-3"> @foreach($bukus as $item)
        <div class="col-6 col-md-4 col-lg-2"> <div class="card h-100 border-0 shadow-sm p-2" style="border-radius: 15px;">
                <div class="text-center" style="border-radius: 10px; overflow: hidden;">
                    <img src="{{ asset('images/' . $item->gambar) }}" 
                         class="img-fluid" 
                         alt="{{ $item->judul }}"
                         style="height: 180px; width: 100%; object-fit: cover; border-radius: 10px;">
                </div>

                <div class="card-body text-center p-2">
                    <h6 class="fw-bold mb-1 text-truncate" style="font-size: 0.85rem;" title="{{ $item->judul }}">
                        {{ $item->judul }}
                    </h6>
                    <p class="text-muted mb-3" style="font-size: 0.75rem;">
                        Oleh: {{ $item->penulis }}
                    </p>
                    
                    <div class="d-grid">
                        <a href="/detail/{{ $item->id }}" 
                           class="btn btn-success btn-sm rounded-pill py-1" 
                           style="font-size: 0.8rem; background-color: #198754;">
                           Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

</body>
</html>