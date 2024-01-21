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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('leave_name_id');
            $table->unsignedBigInteger('profile_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('coor_approve')->default(0);
            $table->string('hr_approve')->default(0);
            $table->string('mang_approve')->default(0);
            $table->unsignedBigInteger('coor_approved')->nullable();
            $table->unsignedBigInteger('hr_approved')->nullable();
            $table->unsignedBigInteger('mang_approved')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();
            $table->foreign('leave_name_id')->references('id')->on('leave_names');
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('coor_approved')->references('id')->on('profiles');
            $table->foreign('hr_approved')->references('id')->on('profiles');
            $table->foreign('mang_approved')->references('id')->on('profiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
