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
        Schema::create('rencana_aksis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_gap');
            $table->text('uraian')->nullable();
            $table->integer('input')->nullable();
            $table->text('output')->nullable();
            $table->text('outcome')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencana_aksis');
    }
};
