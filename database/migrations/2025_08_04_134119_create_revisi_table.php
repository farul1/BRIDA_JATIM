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
        Schema::create('revisis', function (Blueprint $table) {
            $table->id();
            $table->text('link_revisi')->nullable();
            $table->text('catatan')->nullable();
            $table->integer('status')->nullable();
            $table->integer('revision_by')->nullable();
            $table->integer('dokumen_id')->nullable();
            $table->integer('proposal_id')->nullable();
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisi');
    }
};
