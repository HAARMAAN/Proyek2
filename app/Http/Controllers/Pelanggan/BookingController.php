<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function create()
    {
        $layanans = Layanan::all();
        return view('pelanggan.booking.create', compact('layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => 'required|exists:layanan,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required',
            'location_type' => 'required|in:studio,home_service', 
            'metode_pembayaran' => 'required',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);
        $user = Auth::user();
        $hargaAsli = $layanan->price;
        $bintang = $user->bintang_loyalitas;
        $diskon = 0;

        // LOGIKA DISKON STEP-UP & STEP-DOWN
        if ($bintang >= 5 && $bintang <= 10) {
            $diskon = 0.5; // Diskon 50%
        } elseif ($bintang > 10) {
            $diskon = 0.25; // Diskon 25%
        }

        $totalBayar = $hargaAsli - ($hargaAsli * $diskon);

        Booking::create([
            'user_id' => $user->id,
            'layanan_id' => $request->layanan_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'location_type' => $request->location_type,
            'service_address' => $request->service_address,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_booking' => 'pending',
            'total_price' => $totalBayar, // Simpan harga net
        ]);

        return redirect()->route('customer.riwayat')->with('success', 'Booking sukses!');
    }

    public function riwayat()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('layanan')->latest()->get();
        $user = Auth::user();
        return view('pelanggan.booking.riwayat', compact('bookings', 'user'));
    }
}