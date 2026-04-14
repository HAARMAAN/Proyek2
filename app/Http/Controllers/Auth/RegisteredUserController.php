<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'whatsapp_number' => ['required', 'string', 'max:15'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // REVISI: Simpan semua data pelanggan langsung ke tabel Users
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'whatsapp_number' => $request->whatsapp_number,
            'alamat' => $request->alamat,
            'role' => 'pelanggan', // Default role saat daftar adalah pelanggan
            'total_kunjungan' => 0,
            'bintang_loyalitas' => 0,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Redirect ke dashboard (Breeze akan otomatis ke /dashboard)
        return redirect(route('dashboard', absolute: false));
    }
}