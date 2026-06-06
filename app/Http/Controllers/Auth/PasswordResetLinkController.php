<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.exists' => 'Kami tidak dapat menemukan akun dengan alamat email tersebut.',
        ]);

        // Generate token baru
        $token = Str::random(60);

        // Hapus token lama untuk email ini jika ada
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Simpan ke tabel password_resets
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);

        // Kirim email reset password
        $resetUrl = route('password.reset', ['token' => $token, 'email' => $request->email]);
        Mail::send('emails.reset-password', [
            'reset_url' => $resetUrl
        ], function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Atur Ulang Kata Sandi - Luna Home Beauty');
        });

        return back()->with('status', 'Tautan atur ulang kata sandi telah dikirim ke email Anda.');
    }
}
