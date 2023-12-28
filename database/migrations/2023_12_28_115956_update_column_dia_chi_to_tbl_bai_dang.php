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
        Schema::table('tbl_bai_dang', function (Blueprint $table) {
            $table->longText('dia_chi')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_bai_dang', function (Blueprint $table) {
            $table->string('dia_chi')->nullable()->change();
        });
    }
};
