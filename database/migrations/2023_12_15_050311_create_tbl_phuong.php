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
        Schema::create('tbl_phuong', function (Blueprint $table) {
            $table->id('ma_phuong');
            $table->string('ten_phuong');
            $table->unsignedBigInteger('ma_quan');
            $table->foreign('ma_quan')->references('ma_quan')->on('tbl_quan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_phuong');
    }
};
