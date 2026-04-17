<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['user', 'layanan'])->latest()->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $statusLama = $booking->status_booking;
        $statusBaru = $request->status_booking;

        $booking->update(['status_booking' => $statusBaru]);

        // Trigger penambah bintang hanya jika diubah ke 'completed'
        if ($statusBaru === 'completed' && $statusLama !== 'completed') {
            $user = User::find($booking->user_id);
            if ($user) {
                $user->increment('bintang_loyalitas');
                $user->increment('total_kunjungan');
            }
        }

        return redirect()->back()->with('success', 'Status booking dan bintang pelanggan diperbarui!');
    }
    
    // ... method destroy dll tetap ...
}