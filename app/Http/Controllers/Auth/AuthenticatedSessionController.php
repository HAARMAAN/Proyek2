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

        // 1. Coba Login via tabel 'users' (Admin & Owi ada di sini)
        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::guard('web')->user();

            // CEK ROLE: Kalau role-nya pelanggan (kayak si Owi), lempar ke customer dashboard
            if ($user->role === 'pelanggan') {
                return redirect()->route('customer.dashboard');
            }
            
            return redirect()->route('admin.dashboard');
        }

        // 2. Coba Login via tabel 'pelanggan' (Guard: pelanggan)
        if (Auth::guard('pelanggan')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('customer.dashboard');
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