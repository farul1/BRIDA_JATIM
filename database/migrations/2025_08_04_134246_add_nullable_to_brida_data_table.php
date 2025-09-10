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
        Schema::table('brida_data', function (Blueprint $table) {
            $table->dropColumn(['description']);
            $table->dropColumn(['nama']);
            $table->dropColumn(['keterangan']);
        });
        Schema::table('brida_kategori', function (Blueprint $table) {
            $table->text('description')->nullable();
            $table->text('nama')->nullable();
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
