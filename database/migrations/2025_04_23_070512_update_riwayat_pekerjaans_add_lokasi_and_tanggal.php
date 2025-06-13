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
        Schema::table('riwayat_pekerjaans', function (Blueprint $table) {
            $table->string('lokasi')->after('posisi');
            $table->date('tanggal_mulai')->nullable()->after('lokasi');
            $table->date('tanggal_berakhir')->nullable()->after('tanggal_mulai');
            $table->dropColumn('lama_bekerja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayat_pekerjaans', function (Blueprint $table) {
            $table->dropColumn(['lokasi', 'tanggal_mulai', 'tanggal_berakhir']);
            $table->string('lama_bekerja');
        });
    }
};
