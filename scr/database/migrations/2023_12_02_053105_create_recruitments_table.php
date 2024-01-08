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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('job_id')->on('jobs')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('cv_id');
            $table->foreign('cv_id')->references('cv_id')->on('cv')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['job_id', 'cv_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
