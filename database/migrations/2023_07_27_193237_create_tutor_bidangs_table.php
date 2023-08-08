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
        Schema::create('tutor_bidangs', function (Blueprint $table) {
            $table->unsignedBigInteger('tutor_id')->required();
            $table->unsignedBigInteger('bidang_id')->required();
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('restrict')->onUpdate('cascade');
            $table->foreign('bidang_id')->references('id')->on('bidangs')->onDelete('restrict')->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutor_bidangs');
    }
};