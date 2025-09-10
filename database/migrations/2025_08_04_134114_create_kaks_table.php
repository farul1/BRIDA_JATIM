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
        Schema::create('kak', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pag');
            $table->text('dasar_hukum')->nullable();
            $table->text('gambaran_umum')->nullable();
            $table->text('data_pembukaan_wawasan')->nullable();
            $table->text('akses')->nullable();
            $table->text('partisipasi')->nullable();
            $table->text('kontrol')->nullable();
            $table->text('manfaat')->nullable();
            $table->text('internal')->nullable();
            $table->text('eksternal')->nullable();
            $table->text('tujuan_kegiatan')->nullable();
            $table->text('penerima_manfaat')->nullable();
            $table->text('tempat')->nullable();
            $table->text('waktu_mulai')->nullable();
            $table->text('waktu_selesai')->nullable();
            $table->text('subkegiatan')->nullable();
            $table->integer('batasan_kegiatan')->nullable();
            $table->text('durasi')->nullable();
            $table->text('pelaksanaan')->nullable();
            $table->text('penanggung_jawab')->nullable();
            $table->integer('biaya')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaks');
    }
};
