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
        Schema::create('judul', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bidang');
            $table->integer('id_subbidang');
            $table->text('judul');
            $table->text('uraian');
            $table->text('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('judul');
    }
};
