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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->string('job_name');
            $table->string('job_location'); // Địa điểm làm việc
            $table->text('job_description'); // Mô tả công việc
            $table->string('salary')->nullable(); // Mức lương dự kiến
            $table->string('years_of_experience')->nullable(); // Số năm kinh nghiệm
            $table->datetime('expiration_date'); // Hạn chót nộp hồ sơ
            $table->string('type_of_job'); // Loại công việc
            $table->string('job_title'); // Chức danh. VD: Giám đốc, Nhân viên, Bảo vệ,...
            $table->string('academic_level'); // Học vấn: Trung cấp, Cao đẳng,...
            $table->boolean('is_male')->default(false); // Chấp nhận giới tính Nam
            $table->boolean('is_female')->default(false); // Chấp nhận giới tính Nữ
            $table->string('age'); // Độ tuổi. VD: 18 - 40
            $table->text('contact');
            $table->boolean('active')->default(false);
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
        Schema::dropIfExists('jobs');
    }
};