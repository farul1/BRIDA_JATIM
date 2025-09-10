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
        Schema::table('sakip_data', function (Blueprint $table) {
            $table->string('gambar')->nullable()->change();
            $table->text('keterangan')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('sakip_data', function (Blueprint $table) {
            $table->string('gambar')->nullable(false)->change();
            $table->text('keterangan')->nullable(false)->change();
        });
    }

};
