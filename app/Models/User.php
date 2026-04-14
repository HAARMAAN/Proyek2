<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany; // Tambahkan ini

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'whatsapp_number',
        'alamat',
        'role',
        'total_kunjungan',
        'bintang_loyalitas',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'total_kunjungan' => 'integer',
            'bintang_loyalitas' => 'integer',
        ];
    }

    /**
     * RELASI: Satu User bisa memiliki banyak data Booking.
     * REVISI: Tambahkan method ini agar data booking bisa dipanggil langsung dari User.
     */
    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class, 'user_id');
    }
}