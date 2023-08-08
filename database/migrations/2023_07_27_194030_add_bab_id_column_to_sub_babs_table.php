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
        Schema::table('sub_babs', function (Blueprint $table) {
            $table->foreignId('bab_id')->constrained('babs')->after('id')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_babs', function (Blueprint $table) {
            $table->dropForeign(['bab_id']);
            $table->dropColumn('bab_id');
        });
    }
};