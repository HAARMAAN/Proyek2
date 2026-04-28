<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
   public function index(Request $request)
{
    $start_input = $request->input('start_date');
    $end_input = $request->input('end_date');

    try {
        if ($start_input && $end_input) {
            $start_date = Carbon::createFromFormat('d/m/Y', $start_input)->startOfDay()->format('Y-m-d');
            $end_date = Carbon::createFromFormat('d/m/Y', $end_input)->endOfDay()->format('Y-m-d');
        } else {
            $start_date = now()->startOfMonth()->format('Y-m-d');
            $end_date = now()->endOfMonth()->format('Y-m-d');
        }
    } catch (\Exception $e) {
        $start_date = now()->startOfMonth()->format('Y-m-d');
        $end_date = now()->endOfMonth()->format('Y-m-d');
    }

    // QUERY 1: Untuk Tabel Riwayat (Ambil detailnya)
    $laporanBooking = Booking::with(['user', 'layanan'])
        ->where('status_booking', 'completed')
        ->whereBetween('booking_date', [$start_date, $end_date])
        ->latest()
        ->get();

    // QUERY 2: Untuk Ranking (Ambil statistiknya)
    $layananTerlaris = Booking::select('layanan_id', DB::raw('count(*) as total'))
        ->where('status_booking', 'completed')
        ->whereBetween('booking_date', [$start_date, $end_date])
        ->groupBy('layanan_id')
        ->with('layanan')
        ->orderBy('total', 'desc')
        ->take(5)
        ->get();

    // SINKRONISASI: Ambil total dari hasil ranking yang sudah pasti ada datanya
    $totalTreatment = $layananTerlaris->sum('total'); 

    return view('admin.laporan.index', [
        'laporanBooking' => $laporanBooking,
        'start_date' => Carbon::parse($start_date)->format('d/m/Y'),
        'end_date' => Carbon::parse($end_date)->format('d/m/Y'),
        'totalTreatment' => $totalTreatment,
        'layananTerlaris' => $layananTerlaris
    ]);
}
}