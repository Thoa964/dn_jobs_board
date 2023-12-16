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
        Schema::create('tbl_bai_dang', function (Blueprint $table) {
            $table->id('ma_bai_dang');
            $table->unsignedBigInteger('ma_nganh_nghe');
            $table->unsignedBigInteger('ma_phuong');
            $table->string('tai_khoan');
            $table->string('tieu_de');
            $table->string('mo_ta');
            $table->string('dia_chi');
            $table->date('thoi_gian_bat_dau');
            $table->date('thoi_gian_ket_thuc');
            $table->string('kinh_nghiem');
            $table->string('hinh_thuc_lam_viec');
            $table->string('chuc_vu');
            $table->smallInteger('so_luong');
            $table->string('yeu_cau_ung_vien');
            $table->string('quyen_loi');
            $table->string('cach_thuc_ung_tuyen');

            $table->foreign('tai_khoan')->references('tai_khoan')->on('tbl_tai_khoan');
            $table->foreign('ma_nganh_nghe')->references('ma_nganh_nghe')->on('tbl_nganh_nghe');
            $table->foreign('ma_phuong')->references('ma_phuong')->on('tbl_phuong');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_bai_dang');
    }
};
