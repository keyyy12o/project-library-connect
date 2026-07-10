<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku; 
use App\Models\Anggota; 
use Carbon\Carbon; 

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with(['anggota', 'buku'])->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $buku = Buku::where('status', 'Tersedia')->get();
        $anggota = Anggota::all(); 
        return view('peminjaman.create', compact('buku', 'anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota_id' => 'required',
            'buku_id' => 'required',
            'tgl_pinjam' => 'required|date',
            'tgl_kembali' => 'required|date',
        ]);

        Peminjaman::create([
            'anggota_id' => $request->anggota_id,
            'buku_id'    => $request->buku_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali'=> $request->tgl_kembali,
            'status'     => 'Dipinjam',
            'denda'      => 0,
        ]);

        Buku::where('id', $request->buku_id)->update(['status' => 'Dipinjam']);
        return redirect('/peminjaman')->with('success', 'Berhasil mencatat peminjaman');
    }

    public function destroy($id)
    {
        $item = Peminjaman::findOrFail($id);
        Buku::where('id', $item->buku_id)->update(['status' => 'Tersedia']);
        $item->delete();
        return redirect('/peminjaman')->with('success', 'Data dihapus');
    }

    public function kembali($id)
    {
        $item = Peminjaman::findOrFail($id);
        
        $tgl_deadline = Carbon::parse($item->tgl_kembali)->startOfDay();
        $tgl_sekarang = Carbon::now()->startOfDay();
        
        $denda = 0;

        if ($tgl_sekarang->gt($tgl_deadline)) {
            $selisih = $tgl_sekarang->diffInDays($tgl_deadline);
            // Pakai abs() biar angkanya dipaksa positif
            $denda = abs($selisih) * 5000;
        }

        $item->update([
            'status' => 'Sudah Kembali',
            'denda'  => $denda
        ]);

    \App\Models\Buku::where('id', $item->buku_id)->update(['status' => 'Tersedia']);

    return redirect()->back();
}
}