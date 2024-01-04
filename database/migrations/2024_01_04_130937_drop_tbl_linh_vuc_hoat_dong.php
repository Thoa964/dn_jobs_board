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
        Schema::table('tbl_tai_khoan', function (Blueprint $table) {
            $table->dropForeign('tbl_tai_khoan_ma_linh_vuc_hoat_dong_foreign');
            $table->dropColumn('ma_linh_vuc_hoat_dong');
        });

        Schema::dropIfExists('tbl_linh_vuc_hoat_dong');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('tbl_linh_vuc_hoat_dong', function (Blueprint $table) {
            $table->id('ma_linh_vuc_hoat_dong');
            $table->string('ten_linh_vuc_hoat_dong');
            $table->timestamps();
        });

        Schema::table('tbl_tai_khoan', function (Blueprint $table) {
            $table->unsignedBigInteger('ma_linh_vuc_hoat_dong');
            $table->foreign('ma_linh_vuc_hoat_dong')->references('ma_linh_vuc_hoat_dong')->on('tbl_linh_vuc_hoat_dong');
        });
    }
};
