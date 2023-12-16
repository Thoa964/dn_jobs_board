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
        Schema::create('tbl_ho_so', function (Blueprint $table) {
            $table->id('ma_ho_so');
            $table->unsignedBigInteger('ma_ky_nang');
            $table->string('tai_khoan');
            $table->string('gioi_thieu');
            $table->string('bang_cap');
            $table->foreign('tai_khoan')->references('tai_khoan')->on('tbl_tai_khoan');
            $table->foreign('ma_ky_nang')->references('ma_ky_nang')->on('tbl_ky_nang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ho_so');
    }
};
