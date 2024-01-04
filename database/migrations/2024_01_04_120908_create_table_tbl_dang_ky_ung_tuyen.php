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
        Schema::create('tbl_dang_ky_ung_tuyen', function (Blueprint $table) {
            $table->id('ma_dang_ky');
            $table->unsignedBigInteger('ma_ho_so');
            $table->unsignedBigInteger('ma_bai_dang');
            $table->date('ngay_dang_ky');
            $table->enum('trang_thai', ['Đang chờ duyệt', 'Đã duyệt', 'Đã từ chối'])->default('Đang chờ duyệt');

            $table->foreign('ma_ho_so')->references('ma_ho_so')->on('tbl_ho_so');
            $table->foreign('ma_bai_dang')->references('ma_bai_dang')->on('tbl_bai_dang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_dang_ky_ung_tuyen');
    }
};
