<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        // Ambil pelanggan dan hitung jumlah bookingnya secara otomatis
        $pelanggan = User::where('role', 'pelanggan')
                         ->withCount('bookings')
                         ->get();
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    public function show($id)
    {
        $pelanggan = User::withCount('bookings')->findOrFail($id);
        
        return response()->json([
            'id' => $pelanggan->id,
            'name' => $pelanggan->name,
            'email' => $pelanggan->email,
            'whatsapp' => $pelanggan->whatsapp_number ?? '-',
            'loyalitas' => $pelanggan->bintang_loyalitas ?? 0,
            'total_treatment' => $pelanggan->bookings_count,
            'created_at' => $pelanggan->created_at->format('d M Y'),
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'whatsapp_number' => $request->whatsapp_number,
            'bintang_loyalitas' => $request->bintang_loyalitas,
        ]);

        return redirect()->back()->with('success', 'Data ' . $user->name . ' berhasil diupdate!');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Pelanggan dihapus.');
    }
}