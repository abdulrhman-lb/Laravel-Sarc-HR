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
        Schema::create('training_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('training_name_id');
            $table->string('course_place');
            $table->date('training_date_start');
            $table->date('training_date_end');
            $table->integer('training_days_number');
            $table->timestamps();
            $table->foreign('training_name_id')->references('id')->on('training_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_courses');
    }
};
