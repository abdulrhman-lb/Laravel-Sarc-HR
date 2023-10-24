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
        Schema::create('Profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('sub_branch_id');
            $table->string('point');
            $table->string('national_number', 11)->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->unsignedBigInteger('gener_id');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->unsignedBigInteger('marital_status_id');
            $table->string('mobile_phone', 10)->unique();
            $table->string('phone', 10);
            $table->unsignedBigInteger('certificate_id');
            $table->string('certificate_details');
            $table->unsignedBigInteger('jop_title_id');
            $table->string('position');
            $table->date('volunteering_date');
            $table->date('hire_date');
            $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']);
            $table->string('full_name_en');
            $table->string('position_en');
            $table->integer('shoes_size');
            $table->integer('waist_size');
            $table->enum('shoulders_size', ['Small', 'Medium', 'Larg', 'XLarge', 'XXLarge']);
            $table->string('image');
            $table->string('slug');
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('department_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');
            $table->foreign('branch_id')->references('id')->on('branches');
            $table->foreign('sub_branch_id')->references('id')->on('sub_branches');
            $table->foreign('gener_id')->references('id')->on('geners');
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses');
            $table->foreign('jop_title_id')->references('id')->on('jop_titles');
            $table->foreign('certificate_id')->references('id')->on('certificates');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
