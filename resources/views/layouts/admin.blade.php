<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Connect - Admin Panel</title>

    <!-- Bootstrap 5 & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --sidebar-bg: #1e7e4f;
            --sidebar-hover: rgba(255, 255, 255, 0.15);
            --sidebar-active: #ffffff;
            --sidebar-active-text: #1e7e4f;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            margin: 0;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background: linear-gradient(180deg, var(--sidebar-bg) 0%, #145335 100%);
            color: white;
            padding: 25px 15px;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.05);
            z-index: 1000;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            padding: 0 15px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 25px;
        }

        .sidebar-brand i {
            font-size: 1.8rem;
            margin-right: 12px;
        }

        .sidebar-brand span {
            font-size: 1.1rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .nav-link-custom {
            display: flex;
            align-items: center;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-link-custom i {
            width: 25px;
            font-size: 1.1rem;
            margin-right: 12px;
            text-align: center;
        }

        .nav-link-custom:hover {
            background: var(--sidebar-hover);
            color: white;
            transform: translateX(5px);
        }

        .nav-link-custom.active {
            background: var(--sidebar-active);
            color: var(--sidebar-active-text);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .nav-link-custom.active i {
            color: var(--sidebar-active-text);
        }

        /* Top Navbar & Content Area */
        .main-wrapper {
            margin-left: 260px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .top-navbar {
            background-color: white;
            height: 70px;
            padding: 0 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }

        .main-content {
            padding: 35px;
            flex-grow: 1;
        }

        .logout-wrapper {
            position: absolute;
            bottom: 30px;
            width: calc(100% - 30px);
        }

        .btn-logout {
            display: flex;
            align-items: center;
            color: #ffbaba;
            text-decoration: none;
            padding: 12px 18px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-logout:hover {
            background: rgba(255, 75, 75, 0.1);
            color: #ff4b4b;
        }

        /* Card styling global agar sinkron */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="fas fa-book-reader"></i>
            <span>Library Connect</span>
        </div>

        <nav class="nav-menu">
            <a href="{{ route('dashboard') }}" class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="{{ route('buku.index') }}" class="nav-link-custom {{ request()->routeIs('buku.*') ? 'active' : '' }}">
                <i class="fas fa-book"></i>
                <span>Data Buku</span>
            </a>
            
            <a href="{{ route('anggota.index') }}" class="nav-link-custom {{ request()->routeIs('anggota.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Data Anggota</span>
            </a>
            
            <a href="{{ route('peminjaman.index') }}" class="nav-link-custom {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
                <i class="fas fa-exchange-alt"></i>
                <span>Peminjaman</span>
            </a>
        </nav>

        <div class="logout-wrapper">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout border-0 bg-transparent w-100 text-start">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </div>

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Top Navbar -->
        <nav class="top-navbar">
            <div class="navbar-breadcrumb">
                <span class="text-muted fw-medium">Sistem Informasi Perpustakaan</span>
            </div>
            
            <div class="d-flex align-items-center">
                <div class="me-3 text-end d-none d-sm-block">
                    <div class="fw-bold mb-0" style="font-size: 0.9rem;">Admin</div>
                    <small class="text-success" style="font-size: 0.75rem;"><i class="fas fa-circle me-1" style="font-size: 0.5rem;"></i> Online</small>
                </div>
                <img src="https://ui-avatars.com/api/?name=Admin&background=198754&color=fff" alt="Profile" class="rounded-circle shadow-sm" width="40">
            </div>
        </nav>

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>