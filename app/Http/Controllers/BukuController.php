<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $data = Buku::latest()->get();
        return view('buku.index', compact('data'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
    {
        Buku::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'kategori' => $request->kategori,
            'tahun_terbit' => $request->tahun_terbit,
            'status' => $request->status ?? 'Tersedia',
        ]);

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Fungsi untuk menghapus data buku
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        
        $buku->delete();

        return redirect('/buku')->with('success', 'Buku berhasil dihapus!');
    }

    public function show($id)
    {
        $buku = Buku::findOrFail($id);
        return view('user.detail', compact('buku'));
    }
}