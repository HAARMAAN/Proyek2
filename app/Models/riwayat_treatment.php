<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RiwayatTreatment extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan di database.
     */
    protected $table = 'riwayat_treatment';

    /**
     * Kolom yang dapat diisi secara massal (Mass Assignment).
     * REVISI: Sesuaikan dengan kolom di migration terbaru
     */
    protected $fillable = [
        'user_id',            // Ganti dari pelanggan_id
        'booking_id',
        'catatan_treatment',  // Sesuaikan dengan migration
        'poin_didapat',       // Sesuaikan dengan migration
    ];

    /**
     * RELASI: Riwayat ini merujuk pada seorang User (Pelanggan).
     * REVISI: Arahkan ke Model User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * RELASI: Riwayat ini merujuk pada satu data Booking.
     */
    public function booking(): BelongsTo
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
}