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
            $table->longText('dia_diem_lam_viec')->nullable();
            $table->boolean('job_cao_du_lieu')->default(0);
            $table->unsignedBigInteger('ma_phuong')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_bai_dang', function (Blueprint $table) {
            $table->dropColumn(['dia_diem_lam_viec', 'job_cao_du_lieu']);
            $table->unsignedBigInteger('ma_phuong')->nullable(false)->change();
        });
    }
};
