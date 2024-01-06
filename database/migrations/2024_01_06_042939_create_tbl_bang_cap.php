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
        Schema::table('tbl_ho_so', function (Blueprint $table) {
            $table->dropColumn('bang_cap');
        });

        Schema::create('tbl_bang_cap', function (Blueprint $table) {
            $table->id('ma_bang_cap');
            $table->unsignedBigInteger('ma_ho_so');
            $table->string('ten_bang_cap');
            $table->date('ngay_cap_bang');

            $table->foreign('ma_ho_so')->references('ma_ho_so')->on('tbl_ho_so');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_bang_cap');

        Schema::table('tbl_ho_so', function (Blueprint $table) {
            $table->string('bang_cap');
        });
    }
};
