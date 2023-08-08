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
        Schema::table('soal_pilgans', function (Blueprint $table) {
            $table->unsignedBigInteger('freemium_bank_soal_id')->nullable()->after('id');
            $table->foreign('freemium_bank_soal_id')->references('id')->on('freemium_bank_soals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('soal_pilgans', function (Blueprint $table) {
            $table->dropForeign(['freemium_bank_soal_id']);
            $table->dropColumn('freemium_bank_soal_id');
        });
    }
};