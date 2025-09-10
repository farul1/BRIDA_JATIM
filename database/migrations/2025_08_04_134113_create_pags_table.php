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
        Schema::create('pag', function (Blueprint $table) {
            $table->id();
            $table->integer('id_gap')->nullable();
            $table->text('tahun')->nullable();
            $table->text('kode_program')->nullable();
            $table->text('jumlah_anggaran')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pags');
    }
};
