<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('kak', function (Blueprint $table) {
            $table->dropColumn(['batasan_kegiatan']);
        });
        Schema::table('kak', function (Blueprint $table) {
            $table->text('batasan_kegiatan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
