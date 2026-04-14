<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    // Inilah daftar kolom yang "diizinkan" untuk diisi secara massal
    protected $fillable = [
        'user_id',
        'layanan_id',
        'booking_date',
        'booking_time',
        'location_type',
        'service_address',
        'metode_pembayaran',
        'status_booking',
        'bukti_pembayaran',
    ];

    public function user(): BelongsTo
    {
        // Tetap pakai user karena mengikuti kolom user_id
        return $this->belongsTo(User::class, 'user_id');
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}