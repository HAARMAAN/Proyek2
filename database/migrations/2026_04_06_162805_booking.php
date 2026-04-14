<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            
            // REVISI: Hubungkan ke tabel 'users' karena data pelanggan sudah ada di sana
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Tetap ke tabel layanan
            $table->foreignId('layanan_id')->constrained('layanan')->onDelete('cascade');
            
            $table->date('booking_date');
            $table->time('booking_time');
            $table->enum('location_type', ['studio', 'home_service']); 
            $table->text('service_address')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            
            $table->enum('status_booking', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->enum('metode_pembayaran', ['transfer', 'cash'])->default('transfer');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};