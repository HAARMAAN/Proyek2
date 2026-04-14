<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking; 

class PelangganDashboardController extends Controller
{
    public function index()
{
    $user = Auth::user();
    
    $myBookings = Booking::where('user_id', $user->id)
                         ->with('layanan')
                         ->latest()
                         ->take(5)
                         ->get();

    return view('pelanggan.dashboard', [
        'user' => $user,
        'myBookings' => $myBookings,
        // Sesuaikan query dengan status 'completed' dan 'pending'
        'bookingMenunggu' => Booking::where('user_id', $user->id)->where('status_booking', 'pending')->count(),
        'totalBookingSelesai' => Booking::where('user_id', $user->id)->where('status_booking', 'completed')->count(),
        'totalLayanan' => \App\Models\Layanan::count(),
    ]);
}

    public function riwayatBooking()
    {
        // REVISI: Pakai auth standar
        $user = Auth::user();
        
        // REVISI: Pakai user_id dan pastikan relasi 'layanan' terpanggil
        $bookings = Booking::where('user_id', $user->id)
                    ->with('layanan')
                    ->latest()
                    ->get();

        return view('pelanggan.riwayat', compact('user', 'bookings'));
    }

    public function loyalitas()
    {
        // REVISI: Pakai auth standar
        $user = Auth::user();
        
        $rewards = [
            ['bintang' => 5, 'hadiah' => 'Diskon 10% All Treatment'],
            ['bintang' => 10, 'hadiah' => 'Free Masker Wajah'],
            ['bintang' => 20, 'hadiah' => 'Diskon 50% Paket Glowing'],
        ];

        return view('pelanggan.loyalitas', compact('user', 'rewards'));
    }
}