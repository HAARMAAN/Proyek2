<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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
            'whatsapp_number' => ['required', 'string', 'regex:/^(08|\+62|62)[0-9]{8,13}$/'],
            'alamat' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'whatsapp_number.regex' => 'Format nomor WhatsApp tidak valid. Harus diawali dengan 08, 62, atau +62 dan terdiri dari 10-15 digit angka.',
        ]);

        $token = Str::random(40);

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
            'is_verified' => false,
            'verification_token' => $token,
        ]);

        event(new Registered($user));

        // Kirim email verifikasi menggunakan template emails.verify-email
        $verificationUrl = route('verification.verify_token', ['token' => $token]);
        Mail::send('emails.verify-email', [
            'name' => $user->name,
            'verification_url' => $verificationUrl
        ], function ($message) use ($user) {
            $message->to($user->email)
                    ->subject('Verifikasi Akun Luna Home Beauty');
        });

        // Jangan otomatis login, minta user memverifikasi email
        return redirect()->route('login')->with('status', 'Registrasi berhasil! Kami telah mengirimkan tautan verifikasi ke email Anda. Silakan verifikasi akun Anda terlebih dahulu sebelum masuk.');
    }
}