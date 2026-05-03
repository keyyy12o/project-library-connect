<?php

namespace App\Http\Controllers;

use App\Models\Anggota; 
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = Anggota::all(); // Mengambil semua data anggota
        return view('anggota.index', compact('data'));
    }

    public function create()
    {
        return view('anggota.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data
        Anggota::create($request->all());
        return redirect()->route('anggota.index');
    }
}