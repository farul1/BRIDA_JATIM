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
        //
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->integer('jenis_dokumen')->nullable();
            $table->integer('status')->default(0)->nullable();
            $table->integer('proposal_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokumens', function (Blueprint $table) {
            //
        });
    }
};
