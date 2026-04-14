<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User; // Tambahkan ini biar gak error pas manggil User
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'layanan'])->latest()->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function show($id)
    {
        // Ganti 'pelanggan' jadi 'user'
        $booking = Booking::with(['user', 'layanan'])->findOrFail($id);
        return view('admin.booking.show', compact('booking'));
    }

    public function updateStatus(Request $request, $id)
{
    $booking = Booking::findOrFail($id);
    
    $statusLama = $booking->status_booking;
    $statusBaru = $request->status_booking;

    $booking->update([
        'status_booking' => $statusBaru
    ]);

    // REVISI: Pakai 'completed' sesuai isi ENUM database lo
    if ($statusBaru === 'completed' && $statusLama !== 'completed') {
        $user = \App\Models\User::find($booking->user_id);
        
        if ($user) {
            $user->increment('bintang_loyalitas');
            $user->increment('total_kunjungan');
        }
    }

    return redirect()->back()->with('success', 'Status booking berhasil diubah menjadi ' . $statusBaru);
}

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->route('admin.booking.index')->with('success', 'Data booking dihapus');
    }
}