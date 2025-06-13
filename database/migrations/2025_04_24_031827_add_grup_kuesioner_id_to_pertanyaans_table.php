<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->foreignId('grup_kuesioner_id')
                ->nullable()
                ->constrained('grup_kuesioners')
                ->onDelete('set null')
                ->after('id');
        });
    }

    public function down(): void
    {
        Schema::table('pertanyaans', function (Blueprint $table) {
            $table->dropForeign(['grup_kuesioner_id']);
            $table->dropColumn('grup_kuesioner_id');
        });
    }
};
