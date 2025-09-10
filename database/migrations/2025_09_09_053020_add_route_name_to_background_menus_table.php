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
    Schema::table('background_menus', function (Blueprint $table) {
        $table->string('route_name')->nullable()->after('menu')->comment('Nama route untuk menu ini');
    });
}

public function down()
{
    Schema::table('background_menus', function (Blueprint $table) {
        $table->dropColumn('route_name');
    });
}

};
