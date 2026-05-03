<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LibraryConnect - Jelajahi Dunia Buku</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        body { font-family: 'Segoe UI', Roboto, Arial, sans-serif; background: #f5f7fb; overflow-x: hidden; }
        .navbar { background: linear-gradient(to right, #2c4c9c, #3b6edc); padding: 15px 0; }
        
        /* HERO SECTION */
        .hero { position: relative; background: linear-gradient(to right, #eaf1ff, #ffffff); color: #1f2d3d; padding: 80px 0; border-radius: 0 0 60px 60px; overflow: hidden; }
        .hero::before { content: ""; position: absolute; width: 400px; height: 400px; background: rgba(219, 231, 255, 0.6); border-radius: 50%; top: -120px; right: -120px; z-index: 1; }
        .hero-content { position: relative; z-index: 2; }
        
        /* SEARCH BAR */
        .search-group .form-control { height: 50px; border-radius: 12px 0 0 12px; border: 1px solid #ddd; padding-left: 20px; }
        .search-group .btn-success { height: 50px; border-radius: 0 12px 12px 0; padding: 0 25px; background: #28a745; font-weight: 600; border: none; }
        
        /* QUICK CATEGORY SPANS */
        .quick-category span { background: #ffffff; color: #2c4c9c; padding: 6px 18px; border-radius: 20px; cursor: pointer; transition: 0.3s; border: 1px solid #dce4ff; font-size: 14px; display: inline-block; }
        .quick-category span:hover { background: #2c4c9c; color: white; transform: translateY(-2px); }

        /* KOLEKSI SCROLL */
        .koleksi-scroll { 
            display: flex; 
            gap: 1.5rem; 
            overflow-x: auto; 
            padding: 20px 5px; 
            scrollbar-width: none; 
        }
        .koleksi-scroll::-webkit-scrollbar { display: none; }

        /* CARD BUKU */
        .card { border: none; border-radius: 15px; transition: all 0.3s ease; min-width: 220px; background: white; overflow: hidden; }
        .card:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important; }
        .card img { height: 280px; object-fit: cover; }

        /* KATEGORI BOX */
        .category-box { 
            background: white; 
            padding: 25px; 
            border-radius: 15px; 
            text-align: center; 
            font-weight: 600; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); 
            transition: 0.3s; 
            color: #333; 
            border: 1px solid transparent;
            display: block;
        }
        .category-box:hover { background: #f0f4ff; border-color: #3b6edc; transform: scale(1.05); color: #2c4c9c !important; }

        .footer { background: #1a2a4d; color: rgba(255,255,255,0.8); padding: 40px 0; }
        .line { height: 1px; background: #dee2e6; }

        .floating-animation {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        .about-us .shadow-sm:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05) !important;
        }

        .hover-link { transition: 0.3s; }
        .hover-link:hover { color: #ffffff !important; padding-left: 5px; }
        
        .social-links a:hover {
            background-color: #28a745 !important;
            border-color: #28a745 !important;
            transform: translateY(-3px);
            transition: 0.3s;
        }

        html { scroll-behavior: smooth; }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="/"><i class="fas fa-book-open me-2"></i> LibraryConnect</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="ms-auto d-flex align-items-center">
                <a href="/" class="nav-link text-white me-3 active">Beranda</a>
                <a href="/koleksi" class="nav-link text-white me-3">Koleksi</a>
                <a href="#tentang-kami" class="nav-link text-white me-3">Tentang</a>
                <a href="{{ route('login') }}" class="btn btn-success px-4 rounded-pill shadow-sm">Login</a>
            </div>
        </div>
    </div>
</nav>

<section class="hero d-flex align-items-center">
    <div class="container hero-content">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="fw-bold display-5 mb-3">Selamat Datang di <span style="color: #2c4c9c;">LibraryConnect</span></h1>
                <p class="lead mb-4">Temukan ribuan koleksi buku digital dalam satu platform yang mudah diakses.</p>

                <form action="/koleksi" method="GET" class="d-flex search-group mb-3 shadow-sm">
                    <input type="text" name="search" class="form-control" placeholder="Cari judul buku atau penulis..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </form>

                <div class="d-flex gap-2 flex-wrap quick-category">
                    <a href="/koleksi?search=Fiksi" class="text-decoration-none"><span>Fiksi</span></a>
                    <a href="/koleksi?search=Non Fiksi" class="text-decoration-none"><span>Non Fiksi</span></a>
                    <a href="/koleksi?search=Teknologi" class="text-decoration-none"><span>Teknologi</span></a>
                </div>
            </div>
            <div class="col-lg-6 text-center mt-5 mt-lg-0" data-aos="zoom-in">
                <img src="{{ asset('images/reading-time.svg') }}" class="img-fluid" style="max-width: 80%; transform: scaleX(-1); filter: drop-shadow(-10px 10px 15px rgba(0,0,0,0.1));">
            </div>
        </div>
    </div>
</section>

<div class="container mt-5" data-aos="fade-up">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold border-start border-primary border-4 ps-3">Koleksi Buku Populer</h4>
        <a href="/koleksi" class="btn btn-outline-primary btn-sm rounded-pill px-3">Lihat Semua <i class="fas fa-arrow-right ms-1"></i></a>
    </div>

    <div class="koleksi-scroll">
        @foreach($bukus as $item)
        <div class="card shadow-sm">
            <img src="{{ asset('images/' . $item->gambar) }}" class="card-img-top" alt="{{ $item->judul }}">
            <div class="card-body">
                <h6 class="fw-bold text-truncate" title="{{ $item->judul }}">{{ $item->judul }}</h6>
                <p class="text-muted small mb-3">Oleh: {{ $item->penulis }}</p>
                <div class="d-grid">
                    <a href="/detail/{{ $item->id }}" class="btn btn-primary btn-sm rounded-pill">Detail Buku</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-5 mb-5">
    <div class="d-flex align-items-center mb-4" data-aos="fade-right">
        <h5 class="fw-bold mb-0 me-3">Kategori Buku</h5>
        <div class="line flex-grow-1"></div>
    </div>
    <div class="row g-4">
        @php
           $categories = [
                ['Fiksi', '📖'], ['Non Fiksi', '💡'], ['Teknologi', '💻'], ['Sejarah', '📜'],
                ['Komik', '🎨'], ['Akademik', '🎓'], ['Bahasa', '🗣️'], ['Psikologi', '🧠']
            ];
        @endphp
        @foreach($categories as $index => $cat)
        <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
            <a href="/koleksi?search={{ $cat[0] }}" class="category-box text-decoration-none text-dark shadow-sm">
                <span class="fs-4 d-block mb-2">{{ $cat[1] }}</span>
                {{ $cat[0] }}
            </a>
        </div>
        @endforeach
    </div>
</div>
    
<section id="tentang-kami" class="about-us py-5" style="background: linear-gradient(to bottom, #ffffff, #f8fafc);">
    <div class="container py-4">
        <div class="row align-items-center g-5">
            
            <div class="col-lg-5 text-center">
                <div class="position-relative d-inline-block">
                    <div class="position-absolute top-50 start-50 translate-middle" 
                         style="width: 120%; height: 120%; background: #e2e8f0; filter: blur(50px); border-radius: 50%; opacity: 0.5; z-index: -1;">
                    </div>
                    <img src="{{ asset('images/bookshelves.svg') }}" 
                         class="img-fluid floating-animation" 
                         style="max-width: 90%; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.1));" 
                         alt="Tentang Kami">
                </div>
            </div>
            
            <div class="col-lg-7">
                <div class="ps-lg-4">
                    <span class="badge rounded-pill px-3 py-2 mb-3" 
                          style="background-color: #e8f5e9; color: #2e7d32; font-weight: 600; letter-spacing: 1px;">
                        TENTANG KAMI
                    </span>
                    
                    <h2 class="fw-bold mb-4 display-6" style="color: #1e293b; line-height: 1.2;">
                        Membangun Literasi Digital Bersama 
                        <span style="color: #2c7a51; position: relative;">
                            LibraryConnect
                            <svg class="position-absolute start-0 bottom-0" width="100%" height="8px" viewBox="0 0 100 8" preserveAspectRatio="none" style="margin-bottom: -5px; opacity: 0.3;">
                                <path d="M0 7C20 1 40 1 100 7" stroke="#2c7a51" stroke-width="4" fill="transparent" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </h2>
                    
                    <p class="text-muted mb-4" style="font-size: 1.1rem; line-height: 1.8; text-align: justify;">
                        Selamat datang di perpustakaan kami! Kami hadir sebagai jembatan ilmu untuk semua kalangan, menyediakan berbagai koleksi digital mulai dari fiksi yang menghibur hingga referensi akademik yang mendalam.
                    </p>

                    <div class="row g-4 mt-2">
                        <div class="col-md-4">
                            <div class="d-flex align-items-center p-3 shadow-sm bg-white" style="border-radius: 15px; border-left: 4px solid #2c7a51;">
                                <div class="icon-circle bg-light text-success me-3 p-2 rounded-circle">
                                    <i class="fas fa-book-open"></i>
                                </div>
                                <span class="fw-bold text-dark small">Ribuan Buku</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center p-3 shadow-sm bg-white" style="border-radius: 15px; border-left: 4px solid #2c7a51;">
                                <div class="icon-circle bg-light text-success me-3 p-2 rounded-circle">
                                    <i class="fas fa-bolt"></i>
                                </div>
                                <span class="fw-bold text-dark small">Akses Mudah</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-center p-3 shadow-sm bg-white" style="border-radius: 15px; border-left: 4px solid #2c7a51;">
                                <div class="icon-circle bg-light text-success me-3 p-2 rounded-circle">
                                    <i class="fas fa-check"></i>
                                </div>
                                <span class="fw-bold text-dark small">100% Gratis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<footer class="footer mt-5" style="background: #1a2a4d; color: #ffffff; padding: 60px 0 30px;">
    <div class="container">
        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-6" data-aos="fade-up">
                <a class="navbar-brand fw-bold fs-3 text-white d-block mb-3" href="/">
                    <i class="fas fa-book-open me-2"></i> LibraryConnect
                </a>
                <p style="color: rgba(255,255,255,0.7); line-height: 1.8;">
                    Platform perpustakaan digital terpercaya untuk mengakses ribuan koleksi buku kapan saja dan di mana saja. Mari bangun budaya literasi di era digital.
                </p>
                <div class="social-links mt-4">
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2" style="width: 35px; height: 35px; padding-top: 6px;"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2" style="width: 35px; height: 35px; padding-top: 6px;"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle me-2" style="width: 35px; height: 35px; padding-top: 6px;"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 35px; height: 35px; padding-top: 6px;"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 px-lg-5" data-aos="fade-up" data-aos-delay="100">
                <h5 class="fw-bold mb-4">Navigasi</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/" class="text-decoration-none text-white-50 hover-link">Beranda</a></li>
                    <li class="mb-2"><a href="/koleksi" class="text-decoration-none text-white-50 hover-link">Koleksi</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white-50 hover-link">Buku Populer</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-white-50 hover-link">Kategori</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <h5 class="fw-bold mb-4">Kategori</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/koleksi?search=Teknologi" class="text-decoration-none text-white-50 hover-link">Teknologi</a></li>
                    <li class="mb-2"><a href="/koleksi?search=Fiksi" class="text-decoration-none text-white-50 hover-link">Fiksi</a></li>
                    <li class="mb-2"><a href="/koleksi?search=Psikologi" class="text-decoration-none text-white-50 hover-link">Psikologi</a></li>
                    <li class="mb-2"><a href="/koleksi?search=Sejarah" class="text-decoration-none text-white-50 hover-link">Sejarah</a></li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <h5 class="fw-bold mb-4">Bantuan & Kontak</h5>
                <p style="color: rgba(255,255,255,0.7);"><i class="fas fa-map-marker-alt me-2"></i> Jl. Edukasi No. 123, Jakarta, Indonesia</p>
                <p style="color: rgba(255,255,255,0.7);"><i class="fas fa-envelope me-2"></i> support@libraryconnect.id</p>
                <p style="color: rgba(255,255,255,0.7);"><i class="fas fa-phone-alt me-2"></i> +62 812-3456-7890</p>
            </div>
        </div>

        <hr style="background: rgba(255,255,255,0.1); height: 1px; border: 0;">

        <div class="row align-items-center pt-3">
            <div class="col-md-6 text-center text-md-start">
                <p class="small mb-0" style="color: rgba(255,255,255,0.5);">
                    &copy; 2026 <strong>LibraryConnect</strong>. Seluruh Hak Cipta Dilindungi.
                </p>
            </div>
            <div class="col-md-6 text-center text-md-end mt-3 mt-md-0">
                <p class="small mb-0" style="color: rgba(255,255,255,0.5);">
                    Designed with <i class="fas fa-heart text-danger mx-1"></i> for better literacy.
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 800, once: true });
</script>

</body>
</html>