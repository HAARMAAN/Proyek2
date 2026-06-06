<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }

    /**
     * Verify the customer's email using the custom verification token.
     */
    public function verifyByToken(string $token): RedirectResponse
    {
        $user = \App\Models\User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect()->route('login')->withErrors([
                'email' => 'Tautan verifikasi tidak valid atau telah kedaluwarsa.',
            ]);
        }

        $user->is_verified = true;
        $user->email_verified_at = now();
        $user->verification_token = null;
        $user->save();

        event(new Verified($user));

        return redirect()->route('login')->with('status', 'Akun Anda berhasil diverifikasi! Silakan masuk ke akun Anda.');
    }
}
