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
        Schema::create('ho_so_ntd', function (Blueprint $table) {
            $table->id();
            $table->string('tieu_de');
            $table->text('mo_ta_cong_viec');
            $table->string('ky_nang_cong_viec');
            $table->string('vi_tri_td');
            $table->string('trinh_do');
            $table->string('kinh_nghiem');
            $table->string('gioi_tinh');
            $table->string('thoi_gian_thu_viec');
            $table->string('che_do');
            $table->string('ho_so_gom_co');
            $table->string('so_luong_can_tuyen');
            $table->string('muc_luong');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ho_so_ntd');
    }
};
