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
            // Kita letakkan setelah booking_time agar rapi
            $table->time('booking_end_time')->after('booking_time')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('booking', function (Blueprint $table) {
            $table->dropColumn('booking_end_time');
        });
    }
};
