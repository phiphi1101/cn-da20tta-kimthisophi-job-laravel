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
        Schema::create('cv', function (Blueprint $table) {
            $table->id('cv_id');
            $table->string('fullname');
            $table->enum('gender', ['male', 'female']);
            $table->date('birthday');
            $table->string('avatar');
            $table->string('email');
            $table->string('phone');
            $table->string('academic_level');
            $table->string('current_job_description');
            $table->string('current_job_skills');
            $table->string('current_job_potision');
            $table->integer('salary');
            $table->string('english_level');
            $table->string('it_level');
            $table->string('degree_path');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv');
    }
};
