<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class WhatsAppService
{
    /**
     * Mengirim notifikasi konfirmasi booking ke API Node.js
     */
    public function sendBookingConfirmation($booking)
    {
        $user = $booking->user;

        // Validasi data user dan nomor WA
        if (!$user || !$user->whatsapp_number) {
            return false;
        }

        $nomorBersih = $this->formatPhoneNumber($user->whatsapp_number);
        
        try {
            // "Tembak" API Node.js
            $response = Http::asJson()
                ->timeout(5)
                ->withHeaders([
                    'Accept' => 'application/json',
                ])
                ->post('http://127.0.0.1:3000/send-confirmation', [
                    'number'  => $nomorBersih,
                    'name'    => $user->name,
                    'service' => $booking->layanan->layanan_name ?? 'Layanan Beauty',
                    'date'    => Carbon::parse($booking->booking_date)->translatedFormat('d F Y'),
                    'time'    => Carbon::parse($booking->booking_time)->format('H:i'),
                ]);

            // Mengembalikan true jika status code 2xx
            return $response->successful();

        } catch (\Exception $e) {
            // Log error jika server Node.js mati atau koneksi bermasalah
            \Log::error("WhatsApp Service Error: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Format nomor HP ke standar internasional (62)
     */
    private function formatPhoneNumber($number)
    {
        // Hilangkan karakter selain angka
        $number = preg_replace('/[^0-9]/', '', $number);

        // Ubah awalan 0 menjadi 62
        if (strpos($number, '0') === 0) {
            $number = '62' . substr($number, 1);
        }

        return $number;
    }
}