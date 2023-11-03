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
        Schema::create('nha_tuyen_dung', function (Blueprint $table) {
            $table->id();
            $table->string('ten_cty');
            $table->string('dia_chi_cty');
            $table->text('mo_ta');
            $table->string('dien_thoai');
            $table->string('Email');
            $table->string('website');
            $table->string('users_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nha_tuyen_dung');
    }
};
