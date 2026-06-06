<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganLoginController extends Controller
{
    // Menampilkan halaman login khusus pelanggan (bisa pakai view login yang sama)
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // KUNCINYA DI SINI: Kita pakai guard 'pelanggan'
        if (Auth::guard('pelanggan')->attempt($credentials)) {
            $user = Auth::guard('pelanggan')->user();
            
            // CEK VERIFIKASI: Jika belum verifikasi email, tolak login
            if ($user->role === 'pelanggan' && !$user->is_verified) {
                Auth::guard('pelanggan')->logout();
                return back()->withErrors([
                    'email' => 'Akun Anda belum aktif. Silakan verifikasi email Anda terlebih dahulu.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'email' => 'Data login pelanggan tidak cocok dengan data kami.',
        ]);
    }
}