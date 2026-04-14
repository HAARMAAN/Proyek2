<?php

namespace Database\Seeders;

use App\Models\User; // GANTI INI
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'owi',
            'email' => 'owi@gmail.com',
            'password' => Hash::make('12345678'),
            'whatsapp_number' => '08123456789',
            'alamat' => 'Jl. Mawar No. 123, Jakarta',
            'role' => 'pelanggan', // Tentukan rolenya
            'total_kunjungan' => 0,
            'bintang_loyalitas' => 0,
        ]);
    }
}