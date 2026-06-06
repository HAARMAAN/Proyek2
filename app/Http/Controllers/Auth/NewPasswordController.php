<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Carbon\Carbon;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View|RedirectResponse
    {
        $token = $request->route('token');
        $email = $request->email;

        $record = DB::table('password_resets')
            ->where('token', $token)
            ->where('email', $email)
            ->first();

        if (!$record) {
            return redirect()->route('password.request')->withErrors([
                'email' => 'Tautan atur ulang kata sandi tidak valid atau telah kedaluwarsa.',
            ]);
        }

        // Cek apakah token kedaluwarsa (lebih dari 60 menit)
        $createdAt = Carbon::parse($record->created_at);
        if ($createdAt->addMinutes(60)->isPast()) {
            DB::table('password_resets')
                ->where('token', $token)
                ->where('email', $email)
                ->delete();

            return redirect()->route('password.request')->withErrors([
                'email' => 'Tautan atur ulang kata sandi telah kedaluwarsa.',
            ]);
        }

        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $record = DB::table('password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->first();

        if (!$record) {
            throw ValidationException::withMessages([
                'email' => 'Tautan atur ulang kata sandi tidak valid atau telah kedaluwarsa.',
            ]);
        }

        // Cek kedaluwarsa token
        $createdAt = Carbon::parse($record->created_at);
        if ($createdAt->addMinutes(60)->isPast()) {
            DB::table('password_resets')
                ->where('token', $request->token)
                ->where('email', $request->email)
                ->delete();

            throw ValidationException::withMessages([
                'email' => 'Tautan atur ulang kata sandi telah kedaluwarsa.',
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => 'Kami tidak dapat menemukan pengguna dengan alamat email tersebut.',
            ]);
        }

        // Update password
        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        event(new PasswordReset($user));

        // Hapus token setelah berhasil digunakan
        DB::table('password_resets')
            ->where('token', $request->token)
            ->where('email', $request->email)
            ->delete();

        return redirect()->route('login')->with('status', 'Kata sandi Anda berhasil diatur ulang! Silakan masuk dengan kata sandi baru Anda.');
    }
}
