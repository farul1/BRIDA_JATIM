<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
/**
 * Run the migrations.
 */
public function up(): void // <- Diperbarui ke standar L10
{
    Schema::dropIfExists('link_ppids');
    Schema::dropIfExists('link_ejournals');

    Schema::create('link_terkaits', function (Blueprint $table) {
        $table->id();
        $table->text('name')->nullable();
        $table->text('link')->nullable();
        // Baris ini yang diperbaiki, ->after('link') dihapus
        $table->string('gambar_logo')->nullable();
        $table->timestamps();
    });

    Schema::create('link_bypass', function (Blueprint $table) {
        $table->id();
        $table->text('name')->nullable();
        $table->text('link')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
