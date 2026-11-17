<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * WHY: Laravel already ships a `users` table (name, email, password).
 * We do NOT create a second table for clients and staff. One table, one login
 * system, and a `role` column decides what each person may do:
 *   client     - browses, books viewings, pays
 *   management - manages properties, viewings, payment confirmations
 *   admin      - generates the system reports
 * `phone` is useful because payments and viewings are coordinated by phone.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone', 20)->nullable()->after('email');
            $table->string('role', 20)->default('client')->after('phone')->index();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropColumn(['phone', 'role']);
        });
    }
};
