<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config;
use Midtrans\Snap;

class BookingController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('pelanggan.booking.index', compact('layanans'));
    }

   public function create($layanan_id = null)
    {
        $layanans = Layanan::all();
        // Pastikan $layanan_id diikutkan ke dalam compact
        return view('pelanggan.booking.create', compact('layanans', 'layanan_id'));
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

        $startTime = \Carbon\Carbon::parse($request->booking_date . ' ' . $request->booking_time);
        $endTimeWithBuffer = $startTime->copy()->addMinutes($layanan->duration_minutes + 30);

        // --- (Cek Jam Operasional Tetap Sama) ---
        $startHour = $startTime->format('H:i');
        if ($startHour < '09:00' || $startHour > '17:00' || $endTimeWithBuffer->format('H:i') > '17:00') {
            return back()->withErrors(['booking_time' => 'Jadwal harus antara 09:00 - 17:00.'])->withInput();
        }

        // --- (Cek Bentrok Jadwal Tetap Sama) ---
        $isBusy = Booking::where('booking_date', $request->booking_date)
            ->where('status_booking', '!=', 'cancelled')
            ->where(function ($query) use ($startTime, $endTimeWithBuffer) {
                $query->where('booking_time', '<', $endTimeWithBuffer->format('H:i:s'))
                    ->where('booking_end_time', '>', $startTime->format('H:i:s'));
            })->exists();

        if ($isBusy) {
            return back()->withErrors(['booking_time' => 'Maaf, jam tersebut sudah terisi.'])->withInput();
        }

        // --- (Logika Diskon Tetap Sama) ---
        $hargaAsli = $layanan->price;
        $bintang = $user->bintang_loyalitas;
        $persenDiskon = ($bintang >= 5 && $bintang <= 10) ? 0.5 : (($bintang >= 11) ? 0.25 : 0);
        $totalBayar = $hargaAsli - ($hargaAsli * $persenDiskon);

        // --- 5. Simpan Data Booking ke Database ---
        $booking = Booking::create([
            'user_id' => $user->id,
            'layanan_id' => $request->layanan_id,
            'booking_date' => $request->booking_date,
            'booking_time' => $startTime->format('H:i:s'),
            'booking_end_time' => $endTimeWithBuffer->format('H:i:s'),
            'location_type' => $request->location_type,
            'service_address' => $request->service_address,
            'metode_pembayaran' => $request->metode_pembayaran,
            'status_booking' => 'pending',
            'total_price' => $totalBayar,
        ]);

        // ==========================================
        // LOGIKA MIDTRANS START
        // ==========================================
        if ($request->metode_pembayaran == 'transfer') {
            // Konfigurasi Midtrans
            Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            Config::$isProduction = false;
            Config::$isSanitized = true;
            Config::$is3ds = true;

            $params = [
                'transaction_details' => [
                    'order_id' => 'LUNA-' . $booking->id . '-' . time(),
                    'gross_amount' => (int) $totalBayar,
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'email' => $user->email,
                ],
                'item_details' => [
                    [
                        'id' => $layanan->id,
                        'price' => (int) $totalBayar,
                        'quantity' => 1,
                        'name' => $layanan->layanan_name,
                    ]
                ]
            ];

            $snapToken = Snap::getSnapToken($params);
            
            // Simpan snap_token ke database agar bisa dipanggil lagi di riwayat jika perlu
            $booking->update(['snap_token' => $snapToken]);

            return view('pelanggan.booking.checkout', compact('snapToken', 'booking'));
        }
        // ==========================================
        // LOGIKA MIDTRANS END
        // ==========================================

        return redirect()->route('customer.riwayat')->with('success', 'Booking berhasil (Cash)!');
    }

    public function riwayat()
    {
        $bookings = Booking::where('user_id', Auth::id())->with('layanan')->latest()->get();
        $user = Auth::user();
        return view('pelanggan.booking.riwayat', compact('bookings', 'user'));
    }
}