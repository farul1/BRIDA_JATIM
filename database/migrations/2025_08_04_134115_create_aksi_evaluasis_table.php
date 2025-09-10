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
        Schema::create('aksi_evaluasis', function (Blueprint $table) {
            $table->id();
            $table->text('uraian')->nullable();
            $table->text('t_tw1')->nullable();
            $table->text('t_tw2')->nullable();
            $table->text('t_tw3')->nullable();
            $table->text('t_tw4')->nullable();

            $table->text('r_tw1')->nullable();
            $table->text('r_tw2')->nullable();
            $table->text('r_tw3')->nullable();
            $table->text('r_tw4')->nullable();

            $table->text('k_r1')->nullable();
            $table->text('k_r2')->nullable();
            $table->text('k_r3')->nullable();
            $table->text('k_r4')->nullable();

            $table->text('id_indikator')->nullable();
            $table->text('status')->nullable();
            $table->text('hasil')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aksi_evaluasis');
    }
};
