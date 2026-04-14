<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Layanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
{
    $totalPelanggan = User::where('role', 'pelanggan')->count();
    $bookingMenunggu = Booking::where('status_booking', 'pending')->count();
    $totalBookingSelesai = Booking::where('status_booking', 'completed')->count();
    $totalLayanan = Layanan::count();
    $bookingTerbaru = Booking::with(['user', 'layanan'])->latest()->take(5)->get();

    // INI PERUBAHANNYA: Menghitung total harga asli dari tabel layanan
    $totalPendapatan = Booking::where('status_booking', 'completed')
        ->join('layanan', 'booking.layanan_id', '=', 'layanan.id')
        ->sum('layanan.price');

    return view('admin.dashboard', compact(
        'totalPelanggan', 'bookingMenunggu', 'totalBookingSelesai', 
        'totalLayanan', 'bookingTerbaru', 'totalPendapatan'
    ));
}

    public function laporan(Request $request)
    {
        // Filter tanggal (Default bulan ini)
        $start_date = $request->get('start_date', now()->startOfMonth()->toDateString());
        $end_date = $request->get('end_date', now()->endOfMonth()->toDateString());

        // 1. Data Transaksi untuk Tabel
        $laporanBooking = Booking::with(['user', 'layanan'])
            ->whereBetween('booking_date', [$start_date, $end_date])
            ->where('status_booking', 'completed')
            ->get();

        // 2. Statistik Ringkasan
        $totalPendapatan = $laporanBooking->sum(fn($b) => $b->layanan->price);
        $totalTreatment = $laporanBooking->count();

        // 3. Layanan Terlaris (Ranking)
        $layananTerlaris = Booking::select('layanan_id', DB::raw('count(*) as total'))
            ->where('status_booking', 'completed')
            ->groupBy('layanan_id')
            ->with('layanan')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        return view('admin.laporan.index', compact(
            'laporanBooking', 'totalPendapatan', 'totalTreatment', 
            'layananTerlaris', 'start_date', 'end_date'
        ));
    }
}