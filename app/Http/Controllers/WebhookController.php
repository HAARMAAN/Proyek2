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
        // 1. Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;

        try {
            $notif = new Notification();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: ' . $e->getMessage()], 400);
        }

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        // 2. Validasi Signature Key Midtrans
        $statusCode = $notif->status_code;
        $grossAmount = $notif->gross_amount;
        $serverKey = env('MIDTRANS_SERVER_KEY');

        $signature = hash('sha512', $order_id . $statusCode . $grossAmount . $serverKey);

        if ($signature !== $notif->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        // 3. Ambil ID Booking asli (format order_id: LUNA-ID-TIME)
        $parts = explode('-', $order_id);
        $bookingId = $parts[1]; 

        $booking = Booking::find($bookingId);

        if (!$booking) {
            return response()->json(['message' => 'Booking tidak ditemukan'], 404);
        }

        // 4. Logika Update Status — Pisahkan payment_status dan status_booking
        if ($transaction == 'settlement' || ($transaction == 'capture' && $fraud == 'accept')) {
            // Pembayaran Berhasil
            $booking->update([
                'payment_status' => 'paid',
                'status_booking' => 'waiting_confirmation',
            ]);
        } else if ($transaction == 'pending') {
            // Menunggu Pembayaran (tetap pending)
            $booking->update([
                'payment_status' => 'unpaid',
                'status_booking' => 'pending',
            ]);
        } else if ($transaction == 'expire') {
            // Pembayaran Kedaluwarsa
            $booking->update([
                'payment_status' => 'expired',
                'status_booking' => 'expired',
            ]);
        } else if ($transaction == 'deny' || $transaction == 'cancel') {
            // Pembayaran Gagal/Dibatalkan
            $booking->update([
                'payment_status' => 'failed',
                'status_booking' => 'cancelled',
            ]);
        }

        return response()->json(['message' => 'Notification handled']);
    }
}