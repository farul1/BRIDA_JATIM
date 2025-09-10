<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('policy_briefs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');                          
            $table->text('deskripsi')->nullable();            
            $table->string('file')->nullable();               
            $table->string('gambar')->nullable();             
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.php
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_briefs');
    }
};
