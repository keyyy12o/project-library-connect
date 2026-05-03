<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional, jika nama tabelmu 'anggotas')
    protected $table = 'anggotas'; 

    // Daftar kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'telp',
        'alamat',
    ];
}