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
        Schema::create('gap', function (Blueprint $table) {
            $table->id();
            $table->text('kebijakan')->nullable();
            $table->text('program')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('sasaran')->nullable();
            $table->text('data_pembukaan_wawasan')->nullable();
            $table->text('akses')->nullable();
            $table->text('partisipasi')->nullable();
            $table->text('kontrol')->nullable();
            $table->text('manfaat')->nullable();
            $table->text('sebab_faktor_internal')->nullable();
            $table->text('sebab_faktor_eksternal')->nullable();
            $table->text('reformulasi_tujuan')->nullable();
            $table->text('basis_data')->nullable();
            $table->text('indikator_output')->nullable();
            $table->text('indikator_outcome')->nullable();
            $table->text('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaps');
    }
};
