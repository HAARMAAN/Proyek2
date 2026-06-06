<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * 1. Tambah kolom payment_status (enum: unpaid, paid, failed, expired)
     * 2. Update enum status_booking: tambah 'waiting_confirmation' dan 'expired'
     */
    public function up(): void
    {
        // 1. Tambah kolom payment_status
        Schema::table('booking', function (Blueprint $table) {
            $table->enum('payment_status', ['unpaid', 'paid', 'failed', 'expired'])
                  ->default('unpaid')
                  ->after('status_booking');
        });

        // 2. Ubah enum status_booking untuk menambah value baru
        DB::statement("ALTER TABLE booking MODIFY COLUMN status_booking 
            ENUM('pending', 'waiting_confirmation', 'confirmed', 'completed', 'cancelled', 'expired') 
            DEFAULT 'pending'");

        // 3. Migrasi data lama: booking yang sudah confirmed/completed dianggap sudah bayar
        DB::statement("UPDATE booking SET payment_status = 'paid' 
            WHERE status_booking IN ('confirmed', 'completed', 'waiting_confirmation')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan enum status_booking ke semula
        // Catatan: data dengan value 'waiting_confirmation' atau 'expired' harus di-handle manual sebelum rollback
        DB::statement("ALTER TABLE booking MODIFY COLUMN status_booking 
            ENUM('pending', 'confirmed', 'completed', 'cancelled') 
            DEFAULT 'pending'");

        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('payment_status');
        });
    }
};
