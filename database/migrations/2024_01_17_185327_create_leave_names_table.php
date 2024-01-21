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
        Schema::create('leave_names', function (Blueprint $table) {
            $table->id();
            $table->string('leave_name');
            $table->enum('leave_source', ['ثابتة حسب الايام المحددة', 'متغيرة حسب الموظف']);
            $table->integer('max_day')->nullable();
            $table->unsignedBigInteger('hr_approve_id');
            $table->unsignedBigInteger('mang_approve_id');
            $table->foreign('hr_approve_id')->references('id')->on('profiles');
            $table->foreign('mang_approve_id')->references('id')->on('profiles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_names');
    }
};
