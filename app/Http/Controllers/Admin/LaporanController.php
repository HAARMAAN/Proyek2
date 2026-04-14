<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        // Ambil filter tanggal dari request (default: bulan ini)
        $startDate = $request->input('start_date', now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', now()->endOfMonth()->toDateString());

        // Ambil data booking yang sudah SELESAI (Completed) dalam rentang tanggal
        $query = Booking::with(['pelanggan', 'layanan'])
            ->where('status_booking', 'completed')
            ->whereBetween('booking_date', [$startDate, $endDate]);

        $reports = $query->latest()->get();

        // Hitung total pendapatan dari layanan yang selesai
        $totalPendapatan = $reports->sum(function($item) {
            return $item->layanan->price; 
        });

        return view('admin.laporan.index', compact('reports', 'startDate', 'endDate', 'totalPendapatan'));
    }
}