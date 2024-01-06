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
        Schema::table('tbl_ky_nang', function (Blueprint $table) {
            $table->decimal('so_nam_kinh_nghiem', 2, 1)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_ky_nang', function (Blueprint $table) {
            $table->integer('so_nam_kinh_nghiem')->change();
        });
    }
};
