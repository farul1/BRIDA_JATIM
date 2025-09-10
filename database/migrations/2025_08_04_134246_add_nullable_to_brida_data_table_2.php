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
            $table->dropColumn(['gambar']);
            $table->dropColumn(['file']);
        });
        Schema::table('brida_data', function (Blueprint $table) {
            $table->text('gambar')->nullable();
            $table->text('file')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brida_data', function (Blueprint $table) {
            //
        });
    }
};
