<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Kita tidak butuh "use Illuminate\Support\Facades\Auth;" kalau loginnya manual pakai session

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if (
            $request->username == 'admin' &&
            $request->password == '12345'
        ) {
            // Ini login manual pakai session
            session(['admin' => true]);
            return redirect('/dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function logout(Request $request)
    {
        // 1. Hapus session 'admin' yang kita buat tadi
        $request->session()->forget('admin');
        
        // 2. Bersihkan semua data session
        $request->session()->flush();
        
        // 3. Hapus token keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // 4. Balik ke halaman login
        return redirect('/login');
    }
}