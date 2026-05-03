<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

public function detail($id)
{
    $buku = [
        1 => [
            'judul' => 'Petualangan di Dunia',
            'penulis' => 'A. Pratama',
            'gambar' => 'images/book1.jpg',
            'sinopsis' => 'Cerita petualangan seru di dunia fantasi...'
        ],
        2 => [
            'judul' => 'Misteri Malam',
            'penulis' => 'B. Sari',
            'gambar' => 'images/book2.jpg',
            'sinopsis' => 'Kisah misteri penuh teka-teki di malam hari...'
        ],
        3 => [ 
            'judul' => 'Teknologi Masa Depan',
            'penulis' => 'C. Wijaya',
            'gambar' => 'images/book3.jpg',
            'sinopsis' => 'Membahas perkembangan teknologi modern...'
        ],
        4 => [
            'judul' => 'Berpulang',
            'penulis' => 'Tere Liye',
            'gambar' => 'images/book4.jpg',
            'sinopsis' => 'Kisah perjalanan hidup penuh makna...'
        ],
        5 => [
            'judul' => 'Bukan Kamu',
            'penulis' => 'Anonim',
            'gambar' => 'images/book5.jpg',
            'sinopsis' => 'Cerita cinta yang tidak sampai...'
        ],
        6 => [
            'judul' => 'Negriku',
            'penulis' => 'Anonim',
            'gambar' => 'images/book6.jpg',
            'sinopsis' => 'Cerita tentang tanah air dan perjuangan...'
        ],
    ];

    $data = $buku[$id] ?? null;

    return view('user.detail', compact('data'));

}
    public function kategori($nama)
{
    $buku = \App\Models\Buku::where('kategori', $nama)->get();

    return view('user.kategori', compact('buku', 'nama'));
}
}