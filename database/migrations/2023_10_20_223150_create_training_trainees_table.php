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
        Schema::create('training_trainees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_course_id');
            $table->unsignedBigInteger('trainee_id');
            $table->timestamps();
            $table->foreign('training_course_id')->references('id')->on('training_courses');
            $table->foreign('trainee_id')->references('id')->on('Profiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_trainees');
    }
};
