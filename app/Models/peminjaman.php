<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    
    protected $fillable = [
        'anggota_id', 
        'buku_id', 
        'tgl_pinjam', 
        'tgl_kembali', 
        'status',
        'denda',
    ];

    /**
     * Relasi ke Model Anggota
     * Menghubungkan kolom anggota_id ke tabel anggotas
     */
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }

    /**
     * Relasi ke Model Buku
     * Menghubungkan kolom buku_id ke tabel bukus
     */
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }
}