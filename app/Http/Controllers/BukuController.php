<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        // Mengambil data buku terbaru
        $data = Buku::latest()->get();
        return view('buku.index', compact('data'));
    }

    public function create()
    {
        // Menampilkan form tambah buku
        return view('buku.create');
    }

    public function store(Request $request)
    {
        // Menyimpan data buku baru ke database
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
        // Mencari data berdasarkan ID, jika tidak ada akan muncul error 404
        $buku = Buku::findOrFail($id);
        
        // Menghapus data dari database
        $buku->delete();

        // Kembali ke halaman daftar buku dengan pesan sukses
        return redirect('/buku')->with('success', 'Buku berhasil dihapus!');
    }
}