<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pilihan_gandas', function (Blueprint $table) {
            $table->unsignedBigInteger('soal_pilgan_id')->required()->after('id');
            $table->foreign('soal_pilgan_id')->references('id')->on('soal_pilgans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pilihan_gandas', function (Blueprint $table) {
            $table->dropForeign(['soal_pilgan_id']);
            $table->dropColumn('soal_pilgan_id');
        });
    }
};