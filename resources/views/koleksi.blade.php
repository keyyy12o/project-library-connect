<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koleksi Buku - LibraryConnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f5f7fb;
        }

        .card {
            border-radius: 15px;
            transition: 0.3s;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
        }

        /* Styling agar gambar tetap konsisten di grid */
        .img-container {
            border-radius: 10px; 
            overflow: hidden;
            height: 180px;
        }

        .img-container img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }
    </style>
</head>

<body>

<div class="container mt-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-dark">📚 Semua Koleksi Buku</h3>
        <a href="/" class="btn btn-outline-secondary btn-sm rounded-pill px-3">← Kembali ke Beranda</a>
    </div>

    <!-- HASIL PENCARIAN -->
    <h4 class="fw-bold border-start border-success border-4 ps-3 mb-4">
        Hasil Pencarian: <span class="text-success">{{ request('search') ?? 'Semua Buku' }}</span>
    </h4>

    <!-- GRID BUKU -->
    <div class="row g-3"> 
        @foreach($bukus as $item)
        <div class="col-6 col-md-4 col-lg-2"> 
            <div class="card h-100 border-0 shadow-sm p-2">
                
                <!-- Container Gambar -->
                <div class="text-center img-container">
                    <img src="{{ asset('images/' . $item->gambar) }}" 
                         alt="{{ $item->judul }}">
                </div>

<div class="card-body text-center p-2 d-flex flex-column">
    <h6 class="fw-bold mb-1 text-truncate" style="font-size: 0.85rem;" title="{{ $item->judul }}">
        {{ $item->judul }}
    </h6>
    <p class="text-muted mb-3" style="font-size: 0.75rem;">
        Oleh: {{ $item->penulis }}
    </p>
    
    <div class="d-grid mt-auto">
        <a href="/detail/{{ $item->id }}" 
           class="btn btn-success btn-sm rounded-pill py-1" 
           style="font-size: 0.8rem; background-color: #198754; border: none;">
           Sinopsis
        </a>
    </div>
</div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>