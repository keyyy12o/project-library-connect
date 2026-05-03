<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Katalog Perpustakaan</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen flex flex-col items-center p-6 lg:p-8">
        
        <header class="w-full lg:max-w-6xl flex justify-between items-center mb-10">
            <h2 class="text-xl font-bold dark:text-white">E-Library</h2>
            @if (Route::has('login'))
                <nav class="flex gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 border rounded-sm text-sm dark:text-white dark:border-[#3E3E3A]">Dashboard</a>
                    @else
                        <a href="/login" class="bg-green-600 text-white px-6 py-2 rounded-full hover:bg-green-700 transition">Admin Login</a>
                    @endauth
                </nav>
            @endif
        </header>

        <main class="w-full lg:max-w-6xl">
            <div class="mb-10 text-center lg:text-left">
                <h1 class="text-3xl font-bold mb-2 dark:text-white">Selamat Datang di MTs Miftahul Huda</h1>
                <p class="text-[#706f6c] dark:text-[#A1A09A]">Jelajahi koleksi buku terbaru dan terpopuler kami.</p>
            </div>

            <!-- Grid Koleksi Buku -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @forelse($bukus as $buku)
                    <div class="bg-white dark:bg-[#161615] border dark:border-[#3E3E3A] rounded-xl overflow-hidden shadow-sm hover:shadow-md transition">
                        <!-- Gambar Buku -->
                       <div class="aspect-[3/4] w-full overflow-hidden bg-gray-100">
    <img src="{{ url('images/' . trim($buku->gambar)) }}" 
         alt="{{ $buku->judul }}" 
         class="w-full h-full object-cover">
</div>
                        
                        <!-- Detail Buku -->
                        <div class="p-5">
                            <span class="text-xs font-semibold uppercase tracking-wider text-green-600 mb-2 block">
                                {{ $buku->kategori->nama ?? 'Umum' }}
                            </span>
                            <h3 class="font-bold text-lg mb-2 dark:text-white truncate">{{ $buku->judul }}</h3>
                            <p class="text-sm text-[#706f6c] dark:text-[#A1A09A] line-clamp-2 mb-4">
                                {{ $buku->sinopsis }}
                            </p>
                            <a href="/koleksi/{{ $buku->id }}" class="inline-block w-full text-center py-2 bg-gray-100 dark:bg-[#3E3E3A] dark:text-white rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <p class="text-gray-500">Belum ada koleksi buku saat ini.</p>
                    </div>
                @endforelse
            </div>
        </main>

        <footer class="mt-20 py-10 border-t w-full text-center text-sm text-gray-500 dark:border-[#3E3E3A]">
            &copy; 2026 MTs Miftahul Huda. All rights reserved.
        </footer>

    </body>
</html>