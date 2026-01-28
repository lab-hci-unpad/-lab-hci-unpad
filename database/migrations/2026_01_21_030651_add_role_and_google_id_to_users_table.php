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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('mahasiswa')->after('email');
            $table->string('google_id')->nullable()->after('role');
            $table->string('nim')->nullable()->after('google_id');
            $table->string('phone')->nullable()->after('nim');
            $table->text('address')->nullable()->after('phone');
            $table->string('faculty')->nullable()->after('address');
            $table->string('major')->nullable()->after('faculty');
            $table->string('semester')->nullable()->after('major');
            $table->string('avatar')->nullable()->after('semester');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'google_id', 'nim', 'phone', 'address', 'faculty', 'major', 'semester', 'avatar']);
        });
    }
};
