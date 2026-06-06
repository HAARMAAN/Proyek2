<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_verified')->default(0)->after('email');
            $table->string('verification_token')->nullable()->after('is_verified');
        });

        // Set existing users with email_verified_at to be is_verified = 1
        DB::table('users')->whereNotNull('email_verified_at')->update(['is_verified' => 1]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_verified', 'verification_token']);
        });
    }
};
