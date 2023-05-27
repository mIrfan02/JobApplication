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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->nullable();
            
            $table->string('email')->nullable();
            $table->string('fullname')->nullable();
            $table->string('contact')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('role')->nullable();
            $table->string('department')->nullable();
            $table->string('specific_skills')->nullable();
            $table->string('availibilty')->nullable();
            $table->text('technical_skills')->nullable();
            $table->text('work_experience')->nullable();
            $table->string('years_experience')->nullable();
            $table->string('degree')->nullable();
            $table->string('status')->nullable();
            $table->string('current_salary')->nullable();
            $table->text('expected_salary')->nullable();
            $table->string('cv_file_path')->nullable();
            $table->string('transcript_file_path')->nullable();
            $table->string('salary_slip_file_path')->nullable();
            $table->text('reason_to_join')->nullable();
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
