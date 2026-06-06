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
    if (!Schema::hasColumn('layanan', 'location_type')) {
        Schema::table('layanan', function (Blueprint $table) {
            $table->string('location_type')->default('studio');
        });
    }
}

public function down(): void
{
    if (Schema::hasColumn('layanan', 'location_type')) {
        Schema::table('layanan', function (Blueprint $table) {
            $table->dropColumn('location_type');
        });
    }
    }
};