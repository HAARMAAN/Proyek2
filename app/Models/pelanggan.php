<?php

namespace App\Models;

// Menggunakan Authenticatable agar pelanggan bisa LOGIN
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Authenticatable
{
    use HasFactory, Notifiable;

    // 1. Beritahu Laravel nama tabelnya (karena bukan 'pelanggans')
    protected $table = 'pelanggan';

    // 2. Daftarkan kolom yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'nama_lengkap',
        'email',
        'whatsapp_number',
        'alamat',
        'password',
        'total_kunjungan',
        'bintang_loyalitas',
    ];

    // 3. Sembunyikan data sensitif saat data dipanggil
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 4. Casting tipe data agar otomatis dikonversi oleh Laravel
    protected $casts = [
        'password' => 'hashed', // Otomatis meng-hash password saat disimpan
        'total_kunjungan' => 'integer',
        'bintang_loyalitas' => 'integer',
    ];

    /**
     * Relasi: Satu pelanggan bisa punya banyak booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'pelanggan_id');
    }
}