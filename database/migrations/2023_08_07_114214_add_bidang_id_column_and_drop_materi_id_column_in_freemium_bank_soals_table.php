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
        Schema::table('freemium_bank_soals', function (Blueprint $table) {
            $table->dropForeign(['materi_id']);
            $table->dropColumn('materi_id');
            $table->unsignedBigInteger('bidang_id')->nullable();
            $table->foreign('bidang_id')->references('id')->on('bidangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('freemium_bank_soals', function (Blueprint $table) {
            $table->dropForeign(['bidang_id']);
            $table->dropColumn('bidang_id');
            $table->unsignedBigInteger('materi_id')->nullable();
            $table->foreign('materi_id')->references('id')->on('materis')->onDelete('cascade');
        });
    }
};