<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        // 1. Coba Login via tabel 'users' (Admin & Pelanggan ada di sini)
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $user = Auth::guard('web')->user();

            // CEK VERIFIKASI: Jika pelanggan belum verifikasi email, tolak login
            if ($user->role === 'pelanggan' && !$user->is_verified) {
                Auth::guard('web')->logout();
                throw ValidationException::withMessages([
                    'email' => 'Akun Anda belum aktif. Silakan verifikasi email Anda terlebih dahulu.',
                ]);
            }

            $request->session()->regenerate();

            // CEK ROLE: Kalau pelanggan, lempar ke halaman HOME (yang ada 4 menu)
            if ($user->role === 'pelanggan') {
                return redirect()->route('home'); // <-- SUDAH DIGANTI
            }
            
            // Kalau admin tetap ke dashboard admin
            return redirect()->route('admin.dashboard');
        }

        // 2. Coba Login via tabel 'pelanggan' (Guard: pelanggan)
        if (Auth::guard('pelanggan')->attempt($credentials, $remember)) {
            $user = Auth::guard('pelanggan')->user();

            // CEK VERIFIKASI: Jika belum verifikasi email, tolak login
            if ($user->role === 'pelanggan' && !$user->is_verified) {
                Auth::guard('pelanggan')->logout();
                throw ValidationException::withMessages([
                    'email' => 'Akun Anda belum aktif. Silakan verifikasi email Anda terlebih dahulu.',
                ]);
            }

            $request->session()->regenerate();
            
            // Lempar ke halaman HOME (yang ada 4 menu)
            return redirect()->route('home'); // <-- SUDAH DIGANTI
        }

        throw ValidationException::withMessages(['email' => __('auth.failed')]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        Auth::guard('pelanggan')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}