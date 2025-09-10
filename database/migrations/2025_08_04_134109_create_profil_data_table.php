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
        Schema::create('profil_data', function (Blueprint $table) {
            $table->id();
            $table->text('judul');
            $table->text('description')->nullable();
            $table->text('file')->nullable();
            $table->integer('id_kategori');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_data');
    }
};
