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
        Schema::create('tbl_du_an_ca_nhan', function (Blueprint $table) {
            $table->id('ma_du_an');
            $table->unsignedBigInteger('ma_ho_so');
            $table->string('ten_du_an');
            $table->string('mo_ta');
            $table->date('thoi_gian_bat_dau');
            $table->date('thoi_gian_ket_thuc')->nullable();
            $table->foreign('ma_ho_so')->references('ma_ho_so')->on('tbl_ho_so');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_du_an_ca_nhan');
    }
};
