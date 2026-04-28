<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Midtrans\Config;
use Midtrans\Notification;

class WebhookController extends Controller
{
    public function handler(Request $request)
    {
        // 1. Konfigurasi Midtrans menggunakan kunci dari .env
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false; // Karena masih tahap pengembangan (Sandbox)

        try {
            $notif = new Notification();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 400);
        }

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        // 2. Ambil ID Booking asli (Karena order_id Midtrans kita buat format: LUNA-ID-TIME)
        // Kita pecah string "LUNA-12-171374" untuk mengambil angka 12
        $parts = explode('-', $order_id);
        $bookingId = $parts[1]; 

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['message' => 'Booking tidak ditemukan'], 404);
        }

        // 3. Logika Update Status Otomatis
        if ($transaction == 'settlement') {
            // Pembayaran Berhasil
            $booking->update(['status_booking' => 'confirmed']);
        } else if ($transaction == 'pending') {
            // Menunggu Pembayaran
            $booking->update(['status_booking' => 'pending']);
        } else if ($transaction == 'deny' || $transaction == 'expire' || $transaction == 'cancel') {
            // Pembayaran Gagal/Batal
            $booking->update(['status_booking' => 'cancelled']);
        }

        return response()->json(['message' => 'Notification handled']);
    }
}