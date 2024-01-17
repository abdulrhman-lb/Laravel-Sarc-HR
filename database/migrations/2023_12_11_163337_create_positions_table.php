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
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('department_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('position')->nullable();
            $table->string('position_en')->nullable();
            $table->unsignedBigInteger('jop_title_id');
            $table->timestamps();
            $table->foreign('profile_id')->references('id')->on('Profiles');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('jop_title_id')->references('id')->on('jop_titles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('positions');
    }
};
