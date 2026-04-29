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
        Schema::table('booking', function (Blueprint $table) {
            // Tambahkan baris ini di sini
            $table->string('snap_token')->nullable()->after('total_price'); 
        });
    }

    public function down(): void
    {
        Schema::table('booking', function (Blueprint $table) {
            // Tambahkan ini juga agar jika di-rollback, kolomnya hapus lagi
            $table->dropColumn('snap_token');
        });
    }
};
