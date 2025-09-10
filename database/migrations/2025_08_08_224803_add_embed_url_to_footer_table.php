<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('footer', function (Blueprint $table) {
            $table->text('embed_url')->nullable()->after('map_url');
        });
    }

    public function down(): void
    {
        Schema::table('footer', function (Blueprint $table) {
            $table->dropColumn('embed_url');
        });
    }
};
