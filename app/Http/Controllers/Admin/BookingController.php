<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Menampilkan daftar booking berdasarkan status
     */
    public function index(Request $request)
    {
        $query = Booking::with(['user', 'layanan']);

        $status = $request->query('status', 'pending');

        if (in_array($status, ['pending', 'confirmed', 'completed', 'cancelled'])) {
            $query->where('status_booking', $status);
        } else {
            $query->where('status_booking', 'pending');
        }

        $bookings = $query->latest()->get();

        return view('admin.booking.index', compact('bookings', 'status'));
    }
    
    /**
     * Menampilkan riwayat booking (selesai/batal)
     */
    public function history()
    {
        $bookings = Booking::whereIn('status_booking', ['completed', 'cancelled'])
                    ->with(['user', 'layanan'])
                    ->latest()
                    ->get();

        return view('admin.booking.history', compact('bookings'));
    }

    /**
     * Update status booking dan kirim notifikasi WA otomatis
     */
    public function updateStatus(Request $request, $id, WhatsAppService $waService)
    {
        $request->validate([
            'status_booking' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        $booking = Booking::with(['user', 'layanan'])->findOrFail($id);
        $statusLama = $booking->status_booking;
        
        // 1. Simpan perubahan status ke database
        $booking->status_booking = $request->status_booking;
        $booking->save();

        /**
         * 2. Notifikasi WhatsApp
         * Gue hapus syarat statusLama supaya lu bisa ngetes berkali-kali 
         * asal status yang dipilih adalah 'confirmed'.
         */
        if ($request->status_booking === 'confirmed') {
            
            $waSent = $waService->sendBookingConfirmation($booking);
            
            if (!$waSent) {
                // Warning jika Node.js mati atau nomor tidak valid
                session()->flash('warning', 'Status berhasil diubah, namun notifikasi WhatsApp GAGAL terkirim. Pastikan server Node.js aktif.');
            } else {
                // Notif tambahan jika berhasil
                session()->flash('success_wa', 'Notifikasi WhatsApp berhasil dikirim ke pelanggan.');
            }
        }

        // 3. Logika Loyalitas (Hanya jika status berubah jadi COMPLETED)
        if ($request->status_booking === 'completed' && $statusLama !== 'completed') {
            $user = $booking->user; 
            if ($user) {
                $user->increment('total_kunjungan');
                $user->increment('bintang_loyalitas');
            }
        }

        return back()->with('success', 'Status booking berhasil diperbarui.');
    }
}