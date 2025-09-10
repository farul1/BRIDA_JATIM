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
        Schema::table('portal_brida', function (Blueprint $table) {
            if (!Schema::hasColumn('portal_brida', 'deskripsi')) {
                $table->text('deskripsi')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portal_brida', function (Blueprint $table) {
            if (Schema::hasColumn('portal_brida', 'deskripsi')) {
                $table->dropColumn('deskripsi');
            }
        });
    }
};
