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
        // Validasi data yang masuk dengan ketat
        $request->validate([
            'layanan_id' => 'required|exists:layanan,id',
            // Mencegah typo tahun ribuan (seperti 20226) dan booking masa lalu
            'booking_date' => 'required|date|after_or_equal:today|before:2030-12-31',
            'booking_time' => 'required',
            // REVISI: Samain isinya dengan yang ada di Blade (studio & home_service)
            'location_type' => 'required|in:studio,home_service', 
            'metode_pembayaran' => 'required',
        ], [
            // Custom pesan error biar user nggak pusing liat layar oranye
            'booking_date.after_or_equal' => 'Masa booking di masa lalu? Move on dong!',
            'booking_date.before' => 'Tahunnya kejauhan kak, Luna Beauty belum tentu buka di tahun itu.',
            'location_type.in' => 'Pilih lokasi yang tersedia ya!',
        ]);

        // Simpan ke database
        Booking::create([
            'user_id' => Auth::id(),
            'layanan_id' => $request->layanan_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $request->booking_time,
            'location_type' => $request->location_type,
            'service_address' => $request->service_address,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_booking' => 'pending',
        ]);

        return redirect()->route('customer.riwayat')->with('success', 'Booking sukses!');
    }

    public function riwayat()
    {
        // Mengambil data booking milik user yang sedang login saja
        $bookings = Booking::where('user_id', Auth::id())->with('layanan')->latest()->get();
        $user = Auth::user();
        return view('pelanggan.booking.riwayat', compact('bookings', 'user'));
    }
}