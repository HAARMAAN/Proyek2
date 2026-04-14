<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::all();
        return view('admin.layanan.index', compact('layanan'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'layanan_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|in:single,package',
            'duration_minutes' => 'required|integer',
        ]);

        Layanan::create($request->all());

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        
        $request->validate([
            'layanan_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|in:single,package',
            'duration_minutes' => 'required|integer',
        ]);

        $layanan->update($request->all());

        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Layanan::findOrFail($id)->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil dihapus');
    }
}