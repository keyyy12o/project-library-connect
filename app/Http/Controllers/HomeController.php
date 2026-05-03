<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Untuk di Home, kita tampilkan semua atau beberapa saja
        $bukus = Buku::all(); 
        return view('user.home', compact('bukus'));
    }

 public function koleksi(Request $request)
{
    $cari = $request->query('search');
    $query = Buku::query();

    if ($cari) {
        // Daftar kategori yang ada di web kamu (tambahin semua di sini)
        $kategoriList = ['fiksi', 'non fiksi', 'teknologi', 'sejarah', 'psikologi', 'komik', 'akademik', 'bahasa'];

        // Kita cek apakah kata kunci ada di list kategori (tidak peduli besar kecilnya)
        $isKategori = collect($kategoriList)->contains(function ($value) use ($cari) {
            return strcasecmp($value, $cari) == 0;
        });

        if ($isKategori) {
            // Kalau itu kategori, cari di kolom kategori secara spesifik
            // Kita pakai LOWER supaya 'sejarah' di database ketemu sama 'Sejarah' di link
            $query->whereRaw('LOWER(kategori) = ?', [strtolower($cari)]);
        } else {
            // Kalau bukan kategori, cari di judul atau penulis
            $query->where(function($q) use ($cari) {
                $q->where('judul', 'LIKE', '%' . $cari . '%')
                  ->orWhere('penulis', 'LIKE', '%' . $cari . '%');
            });
        }
    }

    $bukus = $query->get();
    return view('koleksi', compact('bukus'));
}
    public function kategori($nama)
{
    // Mengambil buku yang kolom kategorinya cocok dengan nama di URL
    $bukus = Buku::where('kategori', $nama)->get();

    return view('kategori', compact('bukus', 'nama'));
}
}