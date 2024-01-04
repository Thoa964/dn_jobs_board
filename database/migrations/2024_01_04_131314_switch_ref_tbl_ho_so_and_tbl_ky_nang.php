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
            $table->unsignedBigInteger('ma_ho_so');
            $table->foreign('ma_ho_so')->references('ma_ho_so')->on('tbl_ho_so');
        });

        Schema::table('tbl_ho_so', function (Blueprint $table) {
            $table->dropForeign('tbl_ho_so_ma_ky_nang_foreign');
            $table->dropColumn('ma_ky_nang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_ho_so', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_ky_nang');
            $table->foreign('ma_ky_nang')->references('ma_ky_nang')->on('tbl_ky_nang');
        });

        Schema::table('tbl_ky_nang', function (Blueprint $table) {
            $table->dropForeign('tbl_ky_nang_ma_ho_so_foreign');
            $table->dropColumn('ma_ho_so');
        });
    }
};
