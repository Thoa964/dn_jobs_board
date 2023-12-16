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
        Schema::create('tbl_ky_nang', function (Blueprint $table) {
            $table->id('ma_ky_nang');
            $table->string('ten_ky_nang');
            $table->tinyInteger('so_nam_kinh_nghiem');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ky_nang');
    }
};
