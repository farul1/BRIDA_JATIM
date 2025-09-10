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
        Schema::create('info_webs', function (Blueprint $table) {
            $table->id();
            $table->text('profil')->nullable();
            $table->text('tugas_pokok')->nullable();
            $table->text('tentang_kami')->nullable();
            $table->text('tujuan')->nullable();
            $table->text('struktur_organisasi')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_webs');
    }
};
