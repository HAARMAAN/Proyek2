<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable = [
        'user_id',
        'layanan_id',
        'booking_date',
        'booking_time',
        'booking_end_time',
        'location_type',
        'service_address',
        'metode_pembayaran',
        'status_booking',
        'payment_status',
        'bukti_pembayaran',
        'total_price', // Kolom baru untuk harga setelah diskon
    ];

    /**
     * Mapping status_booking ke label Bahasa Indonesia
     */
    public const STATUS_LABELS = [
        'pending'              => 'Menunggu Pembayaran',
        'waiting_confirmation' => 'Menunggu Konfirmasi',
        'confirmed'            => 'Dikonfirmasi',
        'completed'            => 'Selesai',
        'cancelled'            => 'Dibatalkan',
        'expired'              => 'Kedaluwarsa',
    ];

    /**
     * Mapping payment_status ke label Bahasa Indonesia
     */
    public const PAYMENT_LABELS = [
        'unpaid'  => 'Belum Bayar',
        'paid'    => 'Sudah Bayar',
        'failed'  => 'Gagal',
        'expired' => 'Kedaluwarsa',
    ];

    /**
     * Mendapatkan label Indonesia untuk status_booking
     */
    public function getStatusLabelAttribute(): string
    {
        return self::STATUS_LABELS[$this->status_booking] ?? $this->status_booking;
    }

    /**
     * Mendapatkan label Indonesia untuk payment_status
     */
    public function getPaymentLabelAttribute(): string
    {
        return self::PAYMENT_LABELS[$this->payment_status] ?? $this->payment_status;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault(['name' => 'Pelanggan']);
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'layanan_id')->withDefault(['layanan_name' => 'Layanan Tidak Ada']);
    }

}