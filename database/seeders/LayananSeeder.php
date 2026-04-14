<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'layanan_name' => 'Facial Glowing',
                'description' => 'Perawatan wajah untuk hasil kulit lebih cerah.',
                'price' => 150000,
                'category' => 'single',
                'duration_minutes' => 60,
            ],
            [
                'layanan_name' => 'Hair Spa',
                'description' => 'Perawatan rambut bernutrisi.',
                'price' => 100000,
                'category' => 'single',
                'duration_minutes' => 45,
            ],
            [
                'layanan_name' => 'Paket Wedding Beauty',
                'description' => 'Paket lengkap rias dan perawatan pengantin.',
                'price' => 1500000,
                'category' => 'package',
                'duration_minutes' => 180,
            ],
        ];

        foreach ($data as $item) {
            Layanan::create($item);
        }
    }
}