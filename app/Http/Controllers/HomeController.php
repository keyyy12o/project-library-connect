<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $bukus = Buku::all(); 
        return view('user.home', compact('bukus'));
    }

 public function koleksi(Request $request)
{
    $cari = $request->query('search');
    $query = Buku::query();

    if ($cari) {
        $kategoriList = ['fiksi', 'non fiksi', 'teknologi', 'sejarah', 'psikologi', 'komik', 'akademik', 'bahasa'];

        $isKategori = collect($kategoriList)->contains(function ($value) use ($cari) {
            return strcasecmp($value, $cari) == 0;
        });

        if ($isKategori) {
            $query->whereRaw('LOWER(kategori) = ?', [strtolower($cari)]);
        } else {
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
    $bukus = Buku::where('kategori', $nama)->get();

    return view('kategori', compact('bukus', 'nama'));
}
}