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
        Schema::create('training_trainers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_course_id');
            $table->unsignedBigInteger('trainer_id');
            $table->timestamps();
            $table->foreign('training_course_id')->references('id')->on('training_courses');
            $table->foreign('trainer_id')->references('id')->on('trainers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_trainers');
    }
};
