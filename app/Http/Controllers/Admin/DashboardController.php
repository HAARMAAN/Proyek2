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

        // Variabel totalPendapatan sudah dihapus dari sini

        return view('admin.dashboard', compact(
            'totalPelanggan', 'bookingMenunggu', 'totalBookingSelesai', 
            'totalLayanan', 'bookingTerbaru'
        ));
    }

    public function laporan(Request $request)
    {
        $start_date = $request->get('start_date', now()->startOfMonth()->toDateString());
        $end_date = $request->get('end_date', now()->endOfMonth()->toDateString());

        $laporanBooking = Booking::with(['user', 'layanan'])
            ->whereBetween('booking_date', [$start_date, $end_date])
            ->where('status_booking', 'completed')
            ->get();

        // Hitung Pendapatan dihapus, hanya menyisakan jumlah treatment
        $totalTreatment = $laporanBooking->count();

        $layananTerlaris = Booking::select('layanan_id', DB::raw('count(*) as total'))
            ->where('status_booking', 'completed')
            ->groupBy('layanan_id')
            ->with('layanan')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        return view('admin.laporan.index', compact(
            'laporanBooking', 'totalTreatment', 
            'layananTerlaris', 'start_date', 'end_date'
        ));
    }
}