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
            $table->softDeletes(); // Menambah kolom `deleted_at` (soft delete)
            $table->boolean('is_active')->default(true); // Status aktif/nonaktif
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes(); // Hapus kolom `deleted_at`
            $table->dropColumn('is_active'); // Hapus kolom `is_active`
        });
    }
};
