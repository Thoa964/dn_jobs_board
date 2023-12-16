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
            $table->renameColumn('name', 'ten');
            $table->renameColumn('password', 'mat_khau');
            $table->unsignedBigInteger('ma_quyen');
            $table->boolean('trang_thai');
            $table->string('tai_khoan')->unique()->first();
            $table->unsignedBigInteger('ma_phuong')->nullable();
            $table->unsignedBigInteger('ma_linh_vuc_hoat_dong')->nullable();
            $table->string('avatar')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('sdt')->nullable();
            $table->string('cccd')->unique()->nullable();
            $table->string('ma_so_thue')->nullable();
            $table->boolean('gioi_tinh')->nullable();
            $table->date('ngay_sinh')->nullable();
            $table->date('ngay_hoat_dong')->nullable();

            $table->foreign('ma_quyen')->references('ma_quyen')->on('tbl_quyen');
            $table->foreign('ma_phuong')->references('ma_phuong')->on('tbl_phuong');
            $table->foreign('ma_linh_vuc_hoat_dong')->references('ma_linh_vuc_hoat_dong')->on('tbl_linh_vuc_hoat_dong');});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_tai_khoan', function (Blueprint $table) {
            $table->dropColumn(['ma_quyen', 'ma_quan', 'ma_linh_vuc_hoat_dong', 'tai_khoan', 'avatar', 'dia_chi', 'sdt', 'cccd', 'trang_thai', 'ma_so_thue', 'gioi_tinh', 'ngay_sinh', 'ngay_hoat_dong']);
            $table->renameColumn('ten', 'name');
            $table->renameColumn('mat_khau', 'password');
        });
    }
};
