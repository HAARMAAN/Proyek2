<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan di database.
     * Secara default Laravel akan mencari 'layanans', jadi kita harus definisikan 'layanan'.
     */
    protected $table = 'layanan';

    /**
     * Kolom yang dapat diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'layanan_name',
        'description',
        'price',
        'category',
        'duration_minutes',
        'image',
    ];

    /**
     * Casting tipe data agar lebih mudah digunakan di codingan.
     */
    protected $casts = [
        'price' => 'decimal:2',
        'duration_minutes' => 'integer',
    ];

    /**
     * Relasi: Satu layanan bisa memiliki banyak booking.
     */
    public function bookings(): HasMany
    {
        // Parameter kedua adalah foreign key di tabel booking (layanan_id)
        return $this->hasMany(Booking::class, 'layanan_id');
    }

    /**
     * Relasi: Satu layanan bisa muncul di banyak riwayat treatment.
     */
    public function riwayatTreatments(): HasMany
    {
        return $this->hasMany(RiwayatTreatment::class, 'layanan_id');
    }
}