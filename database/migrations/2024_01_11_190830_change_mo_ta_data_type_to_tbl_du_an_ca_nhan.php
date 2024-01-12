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
        Schema::table('tbl_du_an_ca_nhan', function (Blueprint $table) {
            $table->longText('mo_ta')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tbl_du_an_ca_nhan', function (Blueprint $table) {
            $table->text('mo_ta')->change();
        });
    }
};
