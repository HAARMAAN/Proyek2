<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('riwayat_treatment', function (Blueprint $table) {
            $table->id();
            
            // REVISI: Hubungkan ke users, bukan pelanggan
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            
            // Hubungkan ke booking
            $table->foreignId('booking_id')->constrained('booking')->onDelete('cascade');
            
            $table->text('catatan_treatment')->nullable();
            $table->integer('poin_didapat')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('riwayat_treatment');
    }
};